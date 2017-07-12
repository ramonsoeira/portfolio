<?php
/**
 * Plugin Name: Base Hudson_Carolino
 * Description: Controle base do tema Hudson_Carolino.
 * Version: 0.1
 * Author: Hudson Caronilo
 * Author URI: 
 * Licence: GPL2
 */

	function baseHudson_Carolino () {

		//TIPOS DE CONTEÚDO
		conteudosHudson_Carolino();

		//TAXONOMIA
		taxonomiaHudson_Carolino();

		//META BOXES
		metaboxesHudson_Carolino();
	}

	/****************************************************
	* TIPOS DE CONTEÚDO
	*****************************************************/
		function conteudosHudson_Carolino (){

			// TIPOS DE DESTQUE
			tipoDestaque();

			// TIPOS DE PROJETOS
			tipoProjetos();

			// TIPOS DE DESENVOLVEDORES
			tipoDevelopers();

			// TIPOS DE AGÊNCIA
			tipoAgencia();

			// SERVIÇOS
			tipoServico();

			//DEPOIMENTOS
			tipoDepoimento();

			//PARCEIROS
			tipoParceiro();

			/* ALTERAÇÃO DO TÍTULO PADRÃO */
			add_filter( 'enter_title_here', 'trocarTituloPadrao' );
			function trocarTituloPadrao($titulo){

				switch (get_current_screen()->post_type) {

					case 'equipe':
						$titulo = 'Nome do integrante';
					break;

					default:
					break;
				}
			    return $titulo;
			}

		}
	
	/****************************************************
	* CUSTOM POST TYPE
	*****************************************************/

		// CUSTOM POST TYPE DESTAQUES
		function tipoDestaque() {

			$rotulosDestaque = array(
									'name'               => 'Destaque',
									'singular_name'      => 'destaque',
									'menu_name'          => 'Destaques',
									'name_admin_bar'     => 'Destaques',
									'add_new'            => 'Adicionar novo',
									'add_new_item'       => 'Adicionar novo destaque',
									'new_item'           => 'Novo destaque',
									'edit_item'          => 'Editar destaque',
									'view_item'          => 'Ver destaque',
									'all_items'          => 'Todos os destaque',
									'search_items'       => 'Buscar destaque',
									'parent_item_colon'  => 'Dos destaque',
									'not_found'          => 'Nenhum destaque cadastrado.',
									'not_found_in_trash' => 'Nenhum destaque na lixeira.'
								);

			$argsDestaque 	= array(
									'labels'             => $rotulosDestaque,
									'public'             => true,
									'publicly_queryable' => true,
									'show_ui'            => true,
									'show_in_menu'       => true,
									'menu_position'		 => 4,
									'menu_icon'          => 'dashicons-megaphone',
									'query_var'          => true,
									'rewrite'            => array( 'slug' => 'destaque' ),
									'capability_type'    => 'post',
									'has_archive'        => true,
									'hierarchical'       => false,
									'supports'           => array( 'title', 'thumbnail','editor')
								);

			// REGISTRA O TIPO CUSTOMIZADO
			register_post_type('destaque', $argsDestaque);

		}

		// CUSTOM POST TYPE PROJETOS
		function tipoProjetos() {

			$rotulosProjetos = array(
									'name'               => 'Projeto',
									'singular_name'      => 'projeto',
									'menu_name'          => 'Projetos',
									'name_admin_bar'     => 'projetos',
									'add_new'            => 'Adicionar projeto',
									'add_new_item'       => 'Adicionar novo projeto',
									'new_item'           => 'Novo projeto',
									'edit_item'          => 'Editar projeto',
									'view_item'          => 'Ver projeto',
									'all_items'          => 'Todos os projetos',
									'search_items'       => 'Buscar projeto',
									'parent_item_colon'  => 'Dos projetos',
									'not_found'          => 'Nenhum projeto cadastrado.',
									'not_found_in_trash' => 'Nenhum projeto na lixeira.'
								);

			$argsProjetos 	= array(
									'labels'             => $rotulosProjetos,
									'public'             => true,
									'publicly_queryable' => true,
									'show_ui'            => true,
									'show_in_menu'       => true,
									'menu_position'		 => 4,
									'menu_icon'          => 'dashicons-welcome-widgets-menus',
									'query_var'          => true,
									'rewrite'            => array( 'slug' => 'projetos' ),
									'capability_type'    => 'post',
									'has_archive'        => true,
									'hierarchical'       => false,
									'supports'           => array( 'title', 'thumbnail','editor')
								);

			// REGISTRA O TIPO CUSTOMIZADO
			register_post_type('projetos', $argsProjetos);

		}

		// CUSTOM POST TYPE DEVELOPERS
		function tipoDevelopers() {

			$rotulosDevelopers = array(
									'name'               => 'Developer',
									'singular_name'      => 'developer',
									'menu_name'          => 'Developers',
									'name_admin_bar'     => 'developers',
									'add_new'            => 'Adicionar developer',
									'add_new_item'       => 'Adicionar novo developer',
									'new_item'           => 'Novo developer',
									'edit_item'          => 'Editar developer',
									'view_item'          => 'Ver developer',
									'all_items'          => 'Todos os developers',
									'search_items'       => 'Buscar developer',
									'parent_item_colon'  => 'Dos developers',
									'not_found'          => 'Nenhum developer cadastrado.',
									'not_found_in_trash' => 'Nenhum developer na lixeira.'
								);

			$argsDevelopers 	= array(
									'labels'             => $rotulosDevelopers,
									'public'             => true,
									'publicly_queryable' => true,
									'show_ui'            => true,
									'show_in_menu'       => true,
									'menu_position'		 => 4,
									'menu_icon'          => 'dashicons-groups',
									'query_var'          => true,
									'rewrite'            => array( 'slug' => 'desenvolvedores' ),
									'capability_type'    => 'post',
									'has_archive'        => true,
									'hierarchical'       => false,
									'supports'           => array( 'title', 'thumbnail','editor')
								);

			// REGISTRA O TIPO CUSTOMIZADO
			register_post_type('desenvolvedores', $argsDevelopers);

		}

		// CUSTOM POST TYPE AGÊNCIA
		function tipoAgencia() {

			$rotulosAgencia = array(
									'name'               => 'Agência',
									'singular_name'      => 'agência',
									'menu_name'          => 'Agências',
									'name_admin_bar'     => 'agência',
									'add_new'            => 'Adicionar agência',
									'add_new_item'       => 'Adicionar nova agência',
									'new_item'           => 'Nova agência',
									'edit_item'          => 'Editar agência',
									'view_item'          => 'Ver agência',
									'all_items'          => 'Todas as agências',
									'search_items'       => 'Buscar agência',
									'parent_item_colon'  => 'Das agências',
									'not_found'          => 'Nenhuma agência cadastrado.',
									'not_found_in_trash' => 'Nenhuma agência na lixeira.'
								);

			$argsAgencia 	= array(
									'labels'             => $rotulosAgencia,
									'public'             => true,
									'publicly_queryable' => true,
									'show_ui'            => true,
									'show_in_menu'       => true,
									'menu_position'		 => 4,
									'menu_icon'          => 'dashicons-building',
									'query_var'          => true,
									'rewrite'            => array( 'slug' => 'desenvolvedores' ),
									'capability_type'    => 'post',
									'has_archive'        => true,
									'hierarchical'       => false,
									'supports'           => array( 'title', 'thumbnail','editor')
								);

			// REGISTRA O TIPO CUSTOMIZADO
			register_post_type('agencia', $argsAgencia);

		}

		// CUSTOM POST TYPE SERVIÇO
		function tipoServico() {

			$rotulosServico = array(
									'name'               => 'Serviços',
									'singular_name'      => 'Serviço',
									'menu_name'          => 'Serviços',
									'name_admin_bar'     => 'Serviços',
									'add_new'            => 'Adicionar novo',
									'add_new_item'       => 'Adicionar novo serviço',
									'new_item'           => 'Novo serviço',
									'edit_item'          => 'Editar serviço',
									'view_item'          => 'Ver serviço',
									'all_items'          => 'Todos os serviços',
									'search_items'       => 'Buscar serviços',
									'parent_item_colon'  => 'Dos serviços',
									'not_found'          => 'Nenhum serviço cadastrado.',
									'not_found_in_trash' => 'Nenhum serviço na lixeira.'
								);

			$argsServico 	= array(
									'labels'             => $rotulosServico,
									'public'             => true,
									'publicly_queryable' => true,
									'show_ui'            => true,
									'show_in_menu'       => true,
									'menu_position'		 => 4,
									'menu_icon'          => 'dashicons-admin-tools',
									'query_var'          => true,
									'rewrite'            => array( 'slug' => 'servicos' ),
									'capability_type'    => 'post',
									'has_archive'        => true,
									'hierarchical'       => false,
									'supports'           => array( 'title', 'thumbnail', 'editor' )
								);

			// REGISTRA O TIPO CUSTOMIZADO
			register_post_type('servico', $argsServico);

		}

		// CUSTOM POST TYPE DEPOIMENTO
		function tipoDepoimento() {

			$rotulosDepoimento = array(
									'name'               => 'Depoimentos',
									'singular_name'      => 'Depoimento',
									'menu_name'          => 'Depoimentos',
									'name_admin_bar'     => 'Depoimentos',
									'add_new'            => 'Adicionar novo',
									'add_new_item'       => 'Adicionar novo depoimento',
									'new_item'           => 'Novo depoimento',
									'edit_item'          => 'Editar depoimento',
									'view_item'          => 'Ver depoimento',
									'all_items'          => 'Todos os depoimentos',
									'search_items'       => 'Buscar depoimentos',
									'parent_item_colon'  => 'Dos depoimentos',
									'not_found'          => 'Nenhum depoimento cadastrado.',
									'not_found_in_trash' => 'Nenhum depoimento na lixeira.'
								);

			$argsDepoimento 	= array(
									'labels'             => $rotulosDepoimento,
									'public'             => true,
									'publicly_queryable' => true,
									'show_ui'            => true,
									'show_in_menu'       => true,
									'menu_position'		 => 4,
									'menu_icon'          => 'dashicons-heart',
									'query_var'          => true,
									'rewrite'            => array( 'slug' => 'depoimento' ),
									'capability_type'    => 'post',
									'has_archive'        => true,
									'hierarchical'       => false,
									'supports'           => array( 'title', 'thumbnail', 'editor' )
								);

			// REGISTRA O TIPO CUSTOMIZADO
			register_post_type('depoimento', $argsDepoimento);

		}

		// CUSTOM POST TYPE PARCEIRO
		function tipoParceiro() {

			$rotulosParceiro = array(
									'name'               => 'Parceiros',
									'singular_name'      => 'parceiro',
									'menu_name'          => 'Parceiros',
									'name_admin_bar'     => 'Parceiros',
									'add_new'            => 'Adicionar novo',
									'add_new_item'       => 'Adicionar novo parceiro',
									'new_item'           => 'Novo parceiro',
									'edit_item'          => 'Editar parceiro',
									'view_item'          => 'Ver parceiro',
									'all_items'          => 'Todos os parceiros',
									'search_items'       => 'Buscar parceiros',
									'parent_item_colon'  => 'Dos parceiros',
									'not_found'          => 'Nenhum parceiro cadastrado.',
									'not_found_in_trash' => 'Nenhum parceiro na lixeira.'
								);

			$argsParceiro 	= array(
									'labels'             => $rotulosParceiro,
									'public'             => true,
									'publicly_queryable' => true,
									'show_ui'            => true,
									'show_in_menu'       => true,
									'menu_position'		 => 4,
									'menu_icon'          => 'dashicons-universal-access',
									'query_var'          => true,
									'rewrite'            => array( 'slug' => 'parceiros' ),
									'capability_type'    => 'post',
									'has_archive'        => true,
									'hierarchical'       => false,
									'supports'           => array( 'title', 'thumbnail', 'editor' )
								);

			// REGISTRA O TIPO CUSTOMIZADO
			register_post_type('parceiros', $argsParceiro);

		}

	/****************************************************
	* META BOXES
	*****************************************************/
		function metaboxesHudson_Carolino(){
			add_filter( 'rwmb_meta_boxes', 'registraMetaboxes' );
		}

			function registraMetaboxes( $metaboxes ){

				// PREFIX
				$prefix = 'Hudson_Carolino_';

				// METABOX COMO DESTAQUES
				$metaboxes[] = array(
					'id'			=> 'metaboxDestaque',
					'title'			=> 'Detalhes do destaque',
					'pages' 		=> array('destaque'),
					'context' 		=> 'normal',
					'priority' 		=> 'high',
					'autosave' 		=> false,
					'fields' 		=> array(
						array(
							'name'  => 'Link do destaque: ',
							'id'    => "{$prefix}destaque_link",
							'desc'  => '',
							'type'  => 'text',
						), 
					),
				);

				// METABOX PROJETOS
				$metaboxes[] = array(
					'id'			=> 'metaboxProjetos',
					'title'			=> 'Detalhes do projeto',
					'pages' 		=> array('projetos'),
					'context' 		=> 'normal',
					'priority' 		=> 'high',
					'autosave' 		=> false,
					'fields' 		=> array(
						array(
							'name'  => 'Link do projeto: ',
							'id'    => "{$prefix}projeto_link",
							'desc'  => '',
							'type'  => 'text',
						), 
						array(
							'name'  => 'Breve descrição: ',
							'id'    => "{$prefix}projeto_breve_descricao",
							'desc'  => '',
							'type'  => 'textarea',
						), 
						array(
							'name'  => 'Logo',
							'id'    => "{$prefix}projeto_logo",
							'desc'  => '',
							'type'  => 'image_advanced',
							'max_file_uploads' => 1	
						), 
						array(
							'name'  => 'Developers',
							'id'    	 => "{$prefix}projeto_developers",
							'desc'  	 => '',
							'type'  	 => 'post',
							'post_type'  => 'desenvolvedores',
							'field_type' => 'select',
							'multiple' => true
						), 
						array(
							'name'  => 'Agências',
							'id'    	 => "{$prefix}projeto_agencia",
							'desc'  	 => '',
							'type'  	 => 'post',
							'post_type'  => 'agencia',
							'field_type' => 'select',
							'multiple' => true
						),
					),
				);
				
				// METABOX DESENVOLVEDORES
				$metaboxes[] = array(
					'id'			=> 'metaboxDevelopers',
					'title'			=> 'Detalhes do developer',
					'pages' 		=> array('desenvolvedores'),
					'context' 		=> 'normal',
					'priority' 		=> 'high',
					'autosave' 		=> false,
					'fields' 		=> array(
						array(
							'name'  => 'Foto: ',
							'id'    => "{$prefix}developer_foto",
							'desc'  => '',
							'type'  => 'image_advanced',
							'max_file_uploads' => 1	
						),
						array(
							'name'  => 'Atuação: ',
							'id'    => "{$prefix}developer_atuacao",
							'desc'  => '',
							'type'  => 'text',
						),  
						array(
							'name'  => 'Link facebook: ',
							'id'    => "{$prefix}developer_facebook",
							'desc'  => '',
							'type'  => 'text',
						), 
						array(
							'name'  => 'Link LinkedIn: ',
							'id'    => "{$prefix}developer_LinkedIn",
							'desc'  => '',
							'type'  => 'text',
						), 
						
					),
				);

				// METABOX DESENVOLVEDORES
				$metaboxes[] = array(
					'id'			=> 'metaboxAgencia',
					'title'			=> 'Detalhes da agência',
					'pages' 		=> array('agencia'),
					'context' 		=> 'normal',
					'priority' 		=> 'high',
					'autosave' 		=> false,
					'fields' 		=> array(
						array(
							'name'  => 'Logo: ',
							'id'    => "{$prefix}agencia_logo",
							'desc'  => '',
							'type'  => 'image_advanced',
							'max_file_uploads' => 1	
						),
						
					),
				);

				return $metaboxes;
			}

	/****************************************************
	* TAXONOMIA
	*****************************************************/
		function taxonomiaHudson_Carolino () {
			taxonomiaCategoriaProjetos();
		}

		function taxonomiaCategoriaProjetos() {

			$rotulosCategoriaProjetos = array(
												'name'              => 'Categorias de projeto',
												'singular_name'     => 'Categorias de projetos',
												'search_items'      => 'Buscar categoria do projeto',
												'all_items'         => 'Todas as categorias',
												'parent_item'       => 'Categoria pai',
												'parent_item_colon' => 'Categoria pai:',
												'edit_item'         => 'Editar categoria do projeto',
												'update_item'       => 'Atualizar categoria',
												'add_new_item'      => 'Nova categoria',
												'new_item_name'     => 'Nova categoria',
												'menu_name'         => 'Categorias projetos',
											);

			$argsCategoriaProjetos 		= array(
												'hierarchical'      => true,
												'labels'            => $rotulosCategoriaProjetos,
												'show_ui'           => true,
												'show_admin_column' => true,
												'query_var'         => true,
												'rewrite'           => array( 'slug' => 'categoria-projetos' ),
											);

			register_taxonomy( 'categoriaProjetos', array( 'projetos' ), $argsCategoriaProjetos);

		}

  	/****************************************************
	* AÇÕES
	*****************************************************/

		// INICIA A FUNÇÃO PRINCIPAL
		add_action('init', 'baseHudson_Carolino');

		// IMPLEMENTAÇÃO ADICIONAL PARA EXIBIR/OCULTAR META BOX DE PÁGINAS SIMPLES
		//add_action( 'add_meta_boxes', 'metaboxjs');

		// FLUSHS
		function rewrite_flush() {

	    	baseHudson_Carolino();

	   		flush_rewrite_rules();
		}

		register_activation_hook( __FILE__, 'rewrite_flush' );