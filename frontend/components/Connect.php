<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace frontend\components;

use Yii;
use yii\authclient\ClientInterface;
use yii\authclient\widgets\AuthChoice;
use frontend\components\ConnectAuthChoiceAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Connect extends AuthChoice
{
    /**
     * @var array|null An array of user's accounts
     */
    public $accounts;

    /**
     * @inheritdoc
     */
    public $options = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        ConnectAuthChoiceAsset::register(Yii::$app->view);
        if ($this->popupMode) {
            Yii::$app->view->registerJs("\$('#" . $this->getId() . "').authchoice();");
        }
        $this->options['id'] = $this->getId();
        echo Html::beginTag('div', $this->options);
    }

    public function clientLink($client, $text = null, array $htmlOptions = [])
    {
        $viewOptions = $client->getViewOptions();

        if (empty($viewOptions['widget'])) {
            if ($text === null) {
                $text = Html::tag('span', '', ['class' => 'auth-icon ' . $client->getName()]);
                //$text .= Html::tag('span', $client->getTitle(), ['class' => 'auth-title']);
            }
            if (!array_key_exists('class', $htmlOptions)) {
                $htmlOptions['class'] = $client->getName();
            }
            Html::addCssClass($htmlOptions, ['widget' => 'auth-link']);

            if ($this->popupMode) {
                if (isset($viewOptions['popupWidth'])) {
                    $htmlOptions['data-popup-width'] = $viewOptions['popupWidth'];
                }
                if (isset($viewOptions['popupHeight'])) {
                    $htmlOptions['data-popup-height'] = $viewOptions['popupHeight'];
                }
            }
            echo Html::a($text, $this->createClientUrl($client), $htmlOptions);
        } else {
            $widgetConfig = $viewOptions['widget'];
            if (!isset($widgetConfig['class'])) {
                throw new InvalidConfigException('Widget config "class" parameter is missing');
            }
            /* @var $widgetClass Widget */
            $widgetClass = $widgetConfig['class'];
            if (!(is_subclass_of($widgetClass, AuthChoiceItem::className()))) {
                throw new InvalidConfigException('Item widget class must be subclass of "' . AuthChoiceItem::className() . '"');
            }
            unset($widgetConfig['class']);
            $widgetConfig['client'] = $client;
            $widgetConfig['authChoice'] = $this;
            echo $widgetClass::widget($widgetConfig);
        }
    }

    /**
     * @inheritdoc
     */
    public function createClientUrl($provider)
    {
        if ($this->isConnected($provider)) {
            return Url::to(['/user/settings/disconnect', 'id' => $this->accounts[$provider->getId()]->id]);
        } else {
            return parent::createClientUrl($provider);
        }
    }

    /**
     * Checks if provider already connected to user.
     *
     * @param ClientInterface $provider
     *
     * @return bool
     */
    public function isConnected(ClientInterface $provider)
    {
        return $this->accounts != null && isset($this->accounts[$provider->getId()]);
    }
}
