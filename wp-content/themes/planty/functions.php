<?php
add_action('init','wp_menu');
function wp_menu(){
    add_theme_support('menus'); 
  
}
add_action('wp_enqueue_scripts','plantystyle');
function plantystyle (){
    wp_enqueue_style( 'plantystyle', get_stylesheet_uri(), [] ,"1.2");
    
}

add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
function add_extra_item_to_nav_menu( $items, $args ) {
    if (is_user_logged_in()){
        $admin_login_url = admin_url();
        return $items.'<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-111"><a href="' . esc_url($admin_login_url) . '">Admin</a></li>';
    }
    return $items;
    }

    add_filter( 'wpcf7_form_elements', 'do_shortcode' );  
  add_shortcode('formulairePreCommande', 'formulairePreCommande');
  function formulairePreCommande(){
$toprint=<<<EOD

        <style>
        
        .inputText {margin-bottom: 20px;}
        
        .quantiteFruit {
            height: 56px;
            width: 39px;
            -moz-appearance: textfield;
            text-align: center;
            
        }
        
        /* Chrome */
        .quantiteFruit::-webkit-inner-spin-button,
        .quantiteFruit::-webkit-outer-spin-button { 
            -webkit-appearance: none;
            margin:0;
        }
        
        /* Opéra*/
        .quantiteFruit::-o-inner-spin-button,
        .quantiteFruit::-o-outer-spin-button { 
            -o-appearance: none;
            margin:0
        }
        
        .imageFormulaire{ 
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .imgFruit{
            margin-bottom: 15px;
        }
        
        .imagesFormulaire{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            border-top: 1px solid white;
            border-bottom: 1px solid white;
            padding-bottom: 40px;
            flex-wrap: wrap;
        }
        
        .form-container {
            display: flex;
            justify-content: space-between;
        }
        
        #formulairePrecommande{
            font-family:  "Syne";
            color: #FFFFFF;
            width: 860px;
        }
        
        
        #formulairePrecommande h2 {
        
            margin-top: 0;
            margin-bottom: 0;
            font-size: 30px;
        
        }
        
        .imagesFormulaire h2 {
            width: 100%;
            padding: 40px 0;
            
        }
        
        .formprecom label {
            display: block;
            margin-bottom: 13px;
            font-weight: 400;
            font-size: 20px;
        }
        
        input[type="text"],
        input[type="email"]
        {
            width:100%;
            height: 71px;
            padding: 8px;
        
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 20px ;
          
            
        }
        
        input[type="text"]:not(:last-child),
        input[type="email"]:not(:last-child){
            margin-bottom: 30px;}
        
        input[type="submit"] {
            width: 383px;
            height: 71px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
            font-size: 15px;
            
        }
        
        input[type="submit"] {
            background-color:  #E0B9B4;
            width: 198px;
            height: 55px;
            margin-top: 44px;
        }
        
        .formprecom {
        display: flex;
        flex-wrap: wrap;
        justify-content:center ;
        padding-top: 53px;
        
        }
        
        #formulairePrecommande .formprecom h2{
            margin-bottom: 29px ;
        }
        
        .sousform1{
            width: 50%;
            padding-right: 45px;
            box-sizing: border-box;
            border-right: 1px solid #FFFFFF;
        
            
        
        }
        
        .sousform2{
            width: 50%;
            padding-left: 45px;
            box-sizing: border-box;
        }


        @media(max-width:1024px){
         #formulairePrecommande h2{ 
        text-align:center; }

        .imageFormulaire{
            width:50%;
            margin-bottom:40px;
        }
        }

        @media(max-width:767px){
        #formulairePrecommande h2{ 
        text-align:center; }

        .imageFormulaire{
            width:100%;
            margin-bottom:40px;
        }

        .sousform1{
            width:100%;
            padding-right:0;
            border right:none; 
        }

        .sousform2{
            width:100%;
            padding-right:0;
            border right:none; 
            padding-left:0;
        }
    }




            
        </style>

   
        
        <div class="imagesFormulaire">
            <h2>Votre commande</h2>
EOD;

$site_url= site_url(); // Définit une variable $site_url qui stocke l'URL du site (probablement utilisée ailleurs dans le code).
$gouts= ""; // Initialise une chaîne vide $gouts pour stocker le HTML généré pour chaque "gout" (goût ou produit).
$args= array( // Prépare un tableau d'arguments pour la récupération des posts de type 'gout' dans WordPress.
    'post_type' => 'gout', // spécifie le type de contenu personnalisé à récupérer, ici 'gout'.
);

$posts=get_posts($args); // Utilise la fonction get_posts avec les arguments fournis pour récupérer les posts de type 'gout'.
foreach ($posts as $post){ // Boucle à travers chaque post récupéré pour traiter et générer le HTML correspondant.
    $gouttitle= $post->post_title;   // Stocke le titre du post dans la variable $gouttitle.
    $goutimg= get_the_post_thumbnail_url($post); // Obtient l'URL de l'image à la une du post et la stocke dans $goutimg.
    $thumbnail_id = get_post_thumbnail_id( $post ); // Obtient l'ID de l'image à la une pour le post en cours.
    $goutimgalt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); // Récupère le texte alternatif de l'image à la une et le stocke dans $goutimgalt.
    // Prépare le template HTML pour un "gout", en utilisant les variables précédemment définies.
    $gouttemplate= <<<EOD
    <div class="imageFormulaire">
    <img src="$goutimg"  alt="$goutimgalt" class="imgFruit"> <!-- Affiche l'image avec le texte alternatif -->
    <input type="number" name="$gouttitle" value="0" class="quantiteFruit"> <!-- Champ pour saisir une quantité, pré-rempli à 0 -->
    </div>
    EOD;
    $toprint.= $gouttemplate; // Ajoute le template HTML généré à la chaîne $gouts.
}
     

$toprint.=<<<EOD
</div>
<div class="formprecom">

    <div class="sousform1">
    
        <h2>Vos informations</h2>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
      
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required>
      
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>

    </div>

  
    <div class="sousform2">
    
        <h2>Livraison</h2>
        <label for="adresse">Adresse de livraison :</label>
        <input type="text" name="adresse" rows="4" required>
      
        <label for="code_postal">Code Postal :</label>
        <input type="text" id="code_postal" name="code_postal" required>
      
        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="ville" required>
      
        
    </div>
        <input type="submit" value="Commander">
</div>


EOD;
return $toprint;

  }