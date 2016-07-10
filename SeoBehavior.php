<?php
	namespace porcelanosa\yii2seo;
	
	
	use Yii;
	use yii\behaviors\AttributeBehavior;
	use porcelanosa\yii2seo\models\SeoAttributes;
	use yii\db\ActiveRecord;
	use yii\helpers\ArrayHelper;
	use yii\base\InvalidConfigException;
	
	/**
	 *
	 **/
	class SeoBehavior
		extends AttributeBehavior {
		
		public $model_name = '';
		public $itemscope = '';
		public $mediaType = 'product'; // e.q. product or article
		public $templateType = 'only2'; // 'only2', 'minimum', 'standart', 'full'
		public $image = '';
		public $url = '';
		public $field_prefix = 'seo_';
		
		public function events() {
			return [
				ActiveRecord::EVENT_BEFORE_UPDATE => 'saveSeo',
			];
		}
		
		public function saveSeo() {
			
			$model = $this->owner;
			if ( ! isset( $this->model_name ) || $this->model_name == '' ) {
				throw new InvalidConfigException( "The 'model_name' option is required. For example, 'Items'" );
			}
			$seo = $this->getSeo();
			if($seo) {
				$seo->load(Yii::$app->request->post());
				/*$seo->title = \Yii::$app->request->post($this->field_prefix.'title');
				$seo->meta_descr = \Yii::$app->request->post($this->field_prefix.'meta_descr');*/
				$seo->save();
			}
			else {
				$seo = new SeoAttributes();
				$seo->load(Yii::$app->request->post());
				$seo->model =  $this->modelFromNamespace( $this->model_name );
				$seo->model_id = $model->id;
				/*$seo->title = \Yii::$app->request->post($this->field_prefix.'title');
				$seo->meta_descr = \Yii::$app->request->post($this->field_prefix.'meta_descr');*/
				$seo->save();
			}
			
		}
		
		/**
		 * @return array|null|SeoAttributes
		 * @throws InvalidConfigException
		 */
		public function getSeo() {
			$model = $this->owner;
			if ( ! isset( $this->model_name ) || $this->model_name == '' ) {
				throw new InvalidConfigException( "The 'model_name' option is required. For example, 'Items'" );
			}
			$seo = SeoAttributes::find()->where([
				'model'    => $this->modelFromNamespace( $this->model_name ),
				'model_id' => $model->id
			])->one();
			/*if(!$seo) {
				$seo = new SeoAttributes();
			}*/
			return $seo;
		}
		
		/**
		 * Return model class without namespace
		 *
		 * @param $namespace string
		 *
		 * @return string
		 */
		
		public static function modelFromNamespace( $namespace ) {
			$pattern = '/.+\\\/i';
			
			return preg_replace( $pattern, '', $namespace );
		}
	}