<ul>
   <h1>Qui sommes nous?</h1>
			
		<h3>Je suis Prabhjot Singh Josan</h3>
		<h3>420-4A4 MO Web et Bases de données</h3>
		<h3>Hiver 2020, Collège Montmorency</h3>
</ul>
<h3>Restauration</h3>
<ul>
    <li>L'application "Restauration" permet d' ajouter, modifier et de
        supprimer des plats (meals) et création des comptes.</li>
				<li>L'application est une prototype.
		</li>
    <li>La page d'Accueil présente la liste des plats avec leurs prix, et les détails
		</li>
		  <li>La page d'Accueil présente aussi des liens pour afficher (supprimer et modifier) un user et ajouter un:
		</li>

    <ul>
        <li>Cette version offre  la l'addition, modification et supression de 3 tables. Il
            y a 3 tables (meals, Users et Files)  pour l'instant. <br>
        </li>
    </ul>
    <li>On y retrouve un lien pour ajouter un nouvel/Supprimer/Afficher meal, ajouter un nouveau user et afficher et supprimer un User :</li>
    <ul>
        <li>La page de création d'un meal offre le prix, le nom du plat et les détails <br>
        </li>
		<li>La page de création d'un user offre le courriel et mot de passe <br>
        </li>
		<li>La page pour afficher un user offre la suppresion, la modification et affiche ce que le user a créer <br>
        </li>
	<li>
                La customers affiche les customers du restaurant en monopage et avec routage admin. <br>
        </li>
        <li>
                Les listes liées sont des tables type_meal et name_type. <br>
        </li>
        <li>
                L'autocomplétion fait parti de la table name_meal mais elle est liées à la tabel Meals.(AngularJS, CRUD) <br>
        </li>
        <li>
                bootstrap de Twitter est utiliée pour la mise en page de admin/customers. <br>
        </li>
    </ul>
 
    <ul>
        
        <li>On peut supprimer un plat et un user après confirmation.</li>
        <li>On peut modifier un plat et un user après confirmation.<br>
        </li>
    </ul>
	<li>Si un utilisateur est en session (mot de passe: (admin@admin.com/admin) (cake@cms.com/cake): </li>

	 <ul>
        <li>on retrouve un lien pour créer un nouvel Meal :
            <ul>
               
                <li>
                   Le meal crée peuvent être modifier et supprimer.
                </li>
            </ul>
        </li>
        <li>
            les fonctions Supprimer et Modifier sont possible.
        </li>
    </ul>
    <li>Les User du restaurant peuvent ajouter un File et un Meal, mais pas suppimer ou modifier une meal d'une autre user<br>
    </li>
	<li>Le nom du User est afficher<br>
    </li>
        <li>Les Files sert à ajouter/supprimer/modifire un image. Maintenant nous pouvons ajouter un image en fessant un Drag and Drop sur la page du site.<br>
    </li>
	<li>Un Captcha permet de authentifier un utilisateur<br>
    </li>
    </li>
	<li>JWT permet le log in pour y ajouter/modifier/supprimer les customers (Non fonctionelle)<br>
    </li>
	<ul>
        <li>Lien vers Mon gitHub: </li>
        <a href="https://github.com/PrabhJosan16/ApplicationWebCakePhp"> Lien GitHub</a>

    </ul>
</ul>
<br>

<table>
    <tr>
        <td>
            <h4>Base de données utilisée par l'application :</h4>
            <object data="../webroot/img/Home/index/phpMyAdminModel.PNG" type="image/svg+xml" height="900" width="1100">
                <img src="../webroot/img/Home/index/phpMyAdminModel.PNG" alt=""/>
            </object><br/>
        </td>
    </tr>
    <tr>
        <td>
            <h4>Basé sur ce modèle original :</h4>
            <a href="http://www.databaseanswers.org/data_models/restaurants_and_customers/index.htm" >
                <img src="Contenu/images/data_model.gif" alt=""/><br/>
                Data Model for Restaurants and Customers:</a>
        </td>
        
    </tr>
     <tr>
        <td>
            
        </td>
        
    </tr>
</table>
