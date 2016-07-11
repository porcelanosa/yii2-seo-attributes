<?php
	namespace porcelanosa\yii2seo;
	
	
	use Yii;
	use yii\behaviors\AttributeBehavior;
	use porcelanosa\yii2seo\models\SeoAttributes;
	use yii\db\ActiveRecord;
	use yii\helpers\ArrayHelper;
	use yii\base\InvalidConfigException;
	use yii\helpers\FileHelper;
	use yii\web\UploadedFile;
	
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
		public $uploadPath = '';
		public $url = '';
		
		public function events() {
			return [
				ActiveRecord::EVENT_BEFORE_UPDATE => 'saveSeo',
			];
		}
		
		/**
		 * @throws InvalidConfigException
		 * @return boolean
		 */
		public function saveSeo() {
			if ( ! is_dir( $this->uploadPath ) ) {
				mkdir( $this->uploadPath, 0777, true );
				//var_dump($this->uploadPath);
			}
			$model = $this->owner;
			if ( ! isset( $this->model_name ) || $this->model_name == '' ) {
				throw new InvalidConfigException( "The 'model_name' option is required. For example, 'Items'" );
			}
			$seo = $this->getSeo();
			if ( $seo ) {
				$old_img = $seo->og_image; //
				if ( $seo->load( Yii::$app->request->post() ) ) {
					$image = UploadedFile::getInstance( $seo, 'og_image' );
					
					if ( $image ) {
						// store the source file name
						//$seo->og_image = $image->name;
						$ext = end( ( explode( ".", $image->name ) ) );
						
						// generate a unique file name
						$seo->og_image = Yii::$app->security->generateRandomString() . ".{$ext}";
						
						// the path to save file, you can set an uploadPath
						$path = $this->uploadPath . $seo->og_image;
					} else {
						$seo->og_image = $old_img;
					}
					if ( $seo->save() ) {
						if ( $image ) {
							$image->saveAs( $path );
						}
						
						return true;
					} else {
						return false;
					}
				}
			} else {
				$seo = new SeoAttributes();
				$seo->load( Yii::$app->request->post() );
				$seo->model    = $this->modelFromNamespace( $this->model_name );
				$seo->model_id = $model->id;
				if ( $seo->save() ) {
					return true;
				} else {
					return false;
				}
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
			$seo = SeoAttributes::find()->where(
				[
					'model'    => $this->modelFromNamespace( $this->model_name ),
					'model_id' => $model->id
				]
			)->one()
			;
			
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
		
		
		/***/
		public function delImage($id, $img_attr = 'og_image') {
			$seo_model = SeoAttributes::findOne($id);
			$img_path = FileHelper::normalizePath(Yii::getAlias($this->uploadPath).$seo_model->$img_attr);
			$seo_model->$img_attr = '';
			if($seo_model->save($img_attr)) {
				try{
					unlink($img_path);
				}
				catch(\Exception $e) {
					throw FileNotFoundException::class;
				}
			}
		}
	}