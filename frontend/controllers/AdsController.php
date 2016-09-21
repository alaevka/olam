<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\helpers\Json;
use common\models\Adsothergallery;

class AdsController extends Controller
{
    public function actionIndex()
    {
        
        $search = new \common\models\SearchAdsother;
        $list_categories = \common\models\AdsCategories::find()->where(['lvl' => 0])->orderBy('name')->all();

        $last_10_objects = \common\models\Adsother::find()->orderBy('created_at')->limit(8)->all();

        return $this->render('index', [
            'search' => $search,
            'list_categories' => $list_categories,
            'last_10_objects' => $last_10_objects
        ]);
    }

    public function actionCreate() {

    	$model = new \common\models\Adsother;

        if(!Yii::$app->user->isGuest) {
            $model->contacts_email = Yii::$app->user->identity->email;
            $model->user_id = Yii::$app->user->identity->id;
        }
        $model->period = 1;

        if ($model->load(Yii::$app->request->post())) {

            if ($model->validate()) {

                if($model->save()) {

                    if($_FILES['Adsother']['tmp_name']['gallery'][0] != '') {

                        foreach($_FILES['Adsother']['tmp_name']['gallery'] as $key=>$file) {
                            $ext = end((explode(".", $_FILES['Adsother']['name']['gallery'][$key])));
                            $name = Yii::$app->security->generateRandomString().'.'.$ext;
                            move_uploaded_file($_FILES['Adsother']['tmp_name']['gallery'][$key], 'uploads/other/' . $name);
                            //$this->_createThumbImage($name, 170, 130);
                            $gallery = new Adsothergallery();
                            $gallery->ads_id = $model->id;
                            $gallery->image_name = $name;
                            $gallery->save();

                        }
                    }
                    
                    \Yii::$app->getSession()->setFlash('flash_message', Yii::t('app', 'ads.your_ads_was_added'));
                    return $this->redirect(['index']);

                }

            }

        }

    	return $this->render('create', [
            'model' => $model
        ]);
    }

    public function actionSearch() {
        $search = new \common\models\SearchAdsother;

        if(Yii::$app->request->get('category_id')) {
            $search->category_id = Yii::$app->request->get('category_id');
            $current_category = \common\models\AdsCategories::findOne(Yii::$app->request->get('category_id'));
            $list_categories = \common\models\AdsCategories::find()->where(['lvl' => $current_category->lvl+1, 'root' => $current_category->root])->orderBy('name')->all();
        } else {
            $list_categories = \common\models\AdsCategories::find()->where(['lvl' => 0])->orderBy('name')->all();
        }

        $dataProvider = $search->search(Yii::$app->request->post());

        return $this->render('search', [
            'search' => $search,
            'listDataProvider' => $dataProvider,
            'list_categories' => $list_categories,
        ]);
    }

    public function actionView($id) {

        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = \common\models\Adsother::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}