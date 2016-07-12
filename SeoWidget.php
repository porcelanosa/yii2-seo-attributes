<?php
	namespace porcelanosa\yii2seo;
	
	use porcelanosa\yii2seo\models\SeoAttributes;
	use porcelanosa\yii2seo\SeoBehavior;
	use yii\base\Widget;
	use yii\db\ActiveRecord;

	use kartik\tabs\TabsX;
	/**
	 * Widget to Related Behavior
	 *
	 * @author Porcelanosa
	 */
	class SeoWidget extends Widget {
		/** @var ActiveRecord */
		public $model;
		public $form;
		public $model_name = '';
		public $templateType = '';
		
		/** @var string */
		public $behaviorName;
		
		/** @var SeoBehavior Model of manage Seo Attributes */
		protected $behavior;
		
		public $title = '';
		
		public function init() {
			parent::init();
			$this->behavior = $this->model->getBehavior( $this->behaviorName );
		}
		
		
		/** Render widget */
		public function run() {
			$model = $this->behavior->getSeo()?$this->behavior->getSeo():new SeoAttributes();
			if($this->templateType == 'minimum-minimorum') {
				$items = [
					[
						'label'   => '<i class="glyphicon glyphicon-home"></i> Main',
						'content' => $this->render( 'main', [ 'seoform' => $this->form, 'model' => $model ] ),
						'active'  => true
					]
				];
			}
			else {
				$items = [
					[
						'label'   => '<i class="glyphicon glyphicon-home"></i> Main',
						'content' => $this->render( 'main', [ 'seoform' => $this->form, 'model' => $model ] ),
						'active'  => true
					],
					[
						'label'         => '<i class="glyphicon glyphicon-king"></i> Schema.org',
						'content'       => $this->render(
							'schema_org', [
							'seoform' => $this->form,
							'model'   => $model
						]
						),
						'headerOptions' => [ ]
					],
					[
						'label'         => '<i class="glyphicon glyphicon-king"></i> Open Graph Tags',
						'content'       => $this->render(
							'open_graph_tags', [
							'seoform'  => $this->form,
							'model'    => $model,
							'behavior' => $this->behavior,
							'view'     => $this->getView()
						]
						),
						'headerOptions' => [ ]
					],
					[
						'label'         => '<i class="glyphicon glyphicon-king"></i> Twitter',
						'content'       => $this->render(
							'twitter_card', [
							'seoform' => $this->form,
							'model'   => $model
						]
						),
						'headerOptions' => [ ]
					],
				];
			}
		
			echo TabsX::widget([
				'items'=>$items,
				'position'=>TabsX::POS_ABOVE,
				'encodeLabels'=>false
			]);
		}
	}
	
	?>