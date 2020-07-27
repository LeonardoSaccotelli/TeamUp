<?php
/**
 * Template for the UM Groups. Invites users search
 *
 * Page: "Group", tab "Edit"
 * Page: "Groups", tab "Create a Group"
 * Caller: function um_groups_create_form()
 *
 * This template can be overridden by copying it to:
 * yourtheme/ultimate-member/um-groups/create-group-form.php
 */
if ( ! defined( 'ABSPATH' ) ) exit; ?>


<div class="um-groups-form">
	<form method="post" action="" name="um-form um-groups-form">
		<div class="um-group-fields">

			<?php do_action( 'um_groups_create_form_header', $group ); ?>

			<div class="um-group-field" data-key="group_name">
				<label for="group_name">
					<span class="group-form-label"><?php _e( 'Nome Progetto', 'um-groups' ) ?></span>
					<input type="text" name="group_name" value="<?php echo esc_attr( $group->post_title ) ?>"/>
				</label>
				<?php
				if ( UM()->form()->has_error( 'group_name' ) ) {
					UM()->Groups()->form_process()->show_error( UM()->form()->errors['group_name'] );
				}
				?>
			</div>

			<div class="um-group-field" data-key="group_description">
				<label for="group_description">
					<span class="group-form-label"><?php _e( 'Descrizione Progetto', 'um-groups' ) ?></span>
					<textarea name="group_description"><?php echo esc_attr( $group->post_content ) ?></textarea>
				</label>
				<?php
				if ( UM()->form()->has_error( 'group_description' ) ) {
					UM()->Groups()->form_process()->show_error( UM()->form()->errors['group_description'] );
				}
				?>
			</div>

			<div class="um-group-field" data-key="group_privacy">
				<label for="group_privacy">
					<div class="group-form-label"><?php _e( 'Privacy', 'um-groups' ) ?></div>
				</label>
				<ul class="um-privacy-wrap">
					<!--<li>
					<label>
						<input type="radio" name="group_privacy" value="public" <?php checked( $group->_um_groups_privacy, 'public' ) ?> />
						<?php _e( 'Pubblico', 'um-groups' ) ?>
						<ul>
							<li><?php _e( 'Qualsiasi membro del sito può iscriversi a questo progetto.', "um-groups" ) ?></li>
							<li><?php _e( 'Questo progetto verrà inserito nella lista dei progetti e nei risultati della ricerca.', 'um-groups' ) ?></li>
							<li><?php _e( 'Il contenuto e l\'attività del progetto saranno visibili a qualsiasi membro del sito.', 'um-groups' ) ?></li>
						</ul>
					</label>
					</li>
					<li>-->
					<label>
						<input type="radio" name="group_privacy" value="private" <?php checked( $group->_um_groups_privacy, 'private' ) ?> />
						<?php _e( 'Privato', 'um-groups' ) ?>
						<ul>
							<li><?php _e( "Solo gli utenti che richiedono la registrazione e sono accettati possono unirsi al progetto.", "um-groups" ) ?></li>
							<li><?php _e( "Questo progetto verrà inserito nella directory dei progetti e nei risultati di ricerca.", "um-groups" ) ?></li>
							<li><?php _e( "Il contenuto e l'attività del progetto saranno visibili solo ai membri del progetto.", "um-groups" ) ?></li>
						</ul>
					</label>
					</li>
					<!--<li>
					<label>
						<input type="radio" name="group_privacy" value="hidden" <?php checked( $group->_um_groups_privacy, 'hidden' ) ?> /><?php _e( " Nascosto", "um-groups" ) ?>
						<ul>
							<li><?php _e( "Solo gli utenti che sono invitati possono unirsi al progetto.", "um-groups" ) ?></li>
							<li><?php _e( "Questo progetto non verrà inserito nella lista dei progetti e nei risultati di ricerca.", "um-groups" ) ?></li>
							<li><?php _e( "Il contenuto e l'attività del progetto saranno visibili solo ai membri del progetto.", "um-groups" ) ?></li>
						</ul>
					</label>
					</li>-->
				</ul>
			</div>

			<div class="um-group-field" data-key="post_moderations">
				<label for="posts_moderation">
					<div class="group-form-label"><?php _e( "Gestisci Moderazione Post", "um-groups" ) ?></div>
					<select name="post_moderations" class="um-s2" >
						<option value="auto-published" <?php selected( $group->_um_groups_posts_moderation, 'auto-published' ) ?> ><?php _e( "Pubblicazione automatica", "um-groups" ) ?></option>
						<option value="require-moderation" <?php selected( $group->_um_groups_posts_moderation, 'require-moderation' ) ?> ><?php _e( "Richiesta approvazione Amministratore/Moderatore", "um-groups" ) ?></option>
					</select>
				</label>
			</div>

			<div class="um-group-field" data-key="invites_settings">
				<label for="invites_settings">
					<input type="checkbox" name="invites_settings" value="1" <?php checked( $group->_um_groups_invites_settings ) ?> /><?php _e( "Abilita Invio Inviti", "um-groups" ) ?>
				</label>
			</div>

			<div class="um-group-field" data-key="can_invite_members">
				<label for="can_invite_members">
					<div class="group-form-label"><?php _e( "Chi può invitare i membri ad unirsi ad un progetto?", "um-groups" ) ?></div>
					<select name="can_invite_members" class="um-s2" >
						<option value="0" <?php selected( $group->_um_groups_can_invite, 0 ) ?> ><?php _e( "Tutti i membri", "um-groups" ) ?></option>
						<!--<option value="1" <?php selected( $group->_um_groups_can_invite, 1 ) ?> ><?php _e( "Solo Amministratori e Moderatori del Progetto", "um-groups" ) ?></option>-->
						<option value="2" <?php selected( $group->_um_groups_can_invite, 2 ) ?> ><?php _e( "Solo Amministratori del Progetto", "um-groups" ) ?></option>
					</select>
				</label>
			</div>

			<div class="um-group-field" data-key="categories">
				<label for="categories">
					<div class="group-form-label"><?php _e( 'Category', 'um-groups' ) ?></div>
					<select name="categories[]" class="um-s1" multiple="multiple" placeholder="Choose categories">
						<?php foreach ( $categories as $cat ) { ?>
							<option value="<?php echo esc_attr( $cat->slug ); ?>" <?php selected( in_array( $cat->term_id, $group_categories_ids ) ); ?>><?php echo esc_html( $cat->name ); ?></option>
						<?php } ?>
					</select>
				</label>
				<?php
				if ( UM()->form()->has_error( 'categories' ) ) {
					UM()->Groups()->form_process()->show_error( UM()->form()->errors['categories'] );
				}
				?>
			</div>

			<div class="um-group-field" data-key="group_tags">
				<label for="group_tags">
					<div class="group-form-label"><?php _e( 'Categoria', 'um-groups' ) ?></div>
					<select name="group_tags[]" class="um-s1" multiple="multiple" placeholder="<?php esc_attr_e( 'Scegli categorie', 'um-groups' ) ?>">
						<?php foreach ( $tags as $tag ) { ?>
							<option value="<?php echo esc_attr( $tag->slug ); ?>" <?php selected( in_array( $tag->term_id, $group_tags_ids ) ); ?>><?php echo esc_html( $tag->name ); ?></option>
						<?php } ?>
					</select>
				</label>
				<?php
				if ( UM()->form()->has_error( 'group_tags' ) ) {
					UM()->Groups()->form_process()->show_error( UM()->form()->errors['group_tags'] );
				}
				?>
			</div>

			<div class='um-group-field'>
				<?php wp_nonce_field( 'um-groups-nonce_' . get_current_user_id() ) ?>
				<?php if ( um_is_core_page( 'create_group' ) || 'um_groups' != $group->post_type ) { ?>
					<input type="submit" name="um_groups_submit" class="um-button" value="<?php esc_attr_e( 'Crea Progetto', 'um-groups' ) ?>"/>
				<?php } else { ?>
					<input type="submit" name="um_groups_update" class="um-button" value="<?php esc_attr_e( 'Aggiorna Progetto', 'um-groups' ) ?>"/>
				<?php } ?>
			</div>

			<?php do_action( 'um_groups_create_form_footer', $group ); ?>

		</div>
	</form>
</div>