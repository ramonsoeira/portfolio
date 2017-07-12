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

		// TIPOS DE CONTEÚDO
		conteudosHudson_Carolino();

		// TAXONOMIA
		taxonomiaHudson_Carolino();

		// META BOXES
		metaboxesHudson_Carolino();
	}

	/****************************************************
	* TIPOS DE CONTEÚDO
	*****************************************************/
	function conteudosHudson_Carolino (){

		// TIPOS DE DESTQUE
		tipoDestaque();

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

	/****************************************************
	* META BOXES
	*****************************************************/
	function metaboxesHudson_Carolino(){

		add_filter( 'rwmb_meta_boxes', 'registraMetaboxes' );

	}

		function registraMetaboxes( $metaboxes ){

			$prefix = 'Hudson_Carolino_';

			// METABOX COMO FUNCIONA
			$metaboxes[] = array(

				'id'			=> 'detalhescomofunciona',
				'title'			=> 'Detalhes do tópico',
				'pages' 		=> array( 'como-funciona' ),
				'context' 		=> 'normal',
				'priority' 		=> 'high',
				'autosave' 		=> false,
				'fields' 		=> array(

					array(
						'name'  => 'Texto: ',
						'id'    => "{$prefix}descricaoComoFunciona",
						'desc'  => '',
						'type'  => 'textarea',
					), 
					array(
						'name'  => 'Ícone: ',
						'id'    => "{$prefix}iconeComoFunciona",
						'desc'  => '',
						'type'  => 'image_advanced',
						'max_file_uploads' => 1	,
					),  
					
				),
				
			);

			return $metaboxes;
		}

	/****************************************************
	* TAXONOMIA
	*****************************************************/
	function taxonomiaHudson_Carolino () {

		taxonomiaCategoriaEquipe();

	}

	function taxonomiaCategoriaComofunciona() {

		$rotulosCategoriaComofunciona = array(
											'name'              => 'Categorias do tópico',
											'singular_name'     => 'Categorias do tópico',
											'search_items'      => 'Buscar categoria do tópico',
											'all_items'         => 'Todas as categorias',
											'parent_item'       => 'Categoria pai',
											'parent_item_colon' => 'Categoria pai:',
											'edit_item'         => 'Editar categoria do tópico',
											'update_item'       => 'Atualizar categoria',
											'add_new_item'      => 'Nova categoria',
											'new_item_name'     => 'Nova categoria',
											'menu_name'         => 'Categorias tópicos',
										);

		$argsCategoriaComofunciona 		= array(
											'hierarchical'      => true,
											'labels'            => $rotulosCategoriaComofunciona,
											'show_ui'           => true,
											'show_admin_column' => true,
											'query_var'         => true,
											'rewrite'           => array( 'slug' => 'categoria-como-funciona' ),
										);

		register_taxonomy( 'categoriacomoFunciona', array( 'como-funciona' ), $argsCategoriaComofunciona );

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