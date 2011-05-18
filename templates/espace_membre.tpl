<!-- BEGIN visiteur -->
<div id="retour"></div>

<form name="connexionForm" id="connexionForm" action="#">
	<fieldset>
		<legend>Connexion à la zone membre</legend>
		<label for="login">Nom d'utilisateur :</label>
	    <input type="text" name="login" id="login" />
	    <br/>
		<label for="mdp">Mot de passe :</label>
		<input type="password" name="mdp" id="mdp" />
	    <input type="submit" value="Je me connecte" class="bouton" />
    </fieldset>
</form>
<!-- END visiteur -->

<!-- BEGIN utilisateur -->
plop
<!-- END utilisateur -->

<!-- BEGIN formateur -->
pop
<!-- END formateur -->

<!-- BEGIN administrateur -->
Bonjour {$login}
<!-- END administrateur -->

<!-- Script de connexion en Ajax -->

<script type="text/javascript">
$(document).ready( function () { 
	$("#connexionForm").submit( function() {						 
		$.ajax({ 
		   type: "POST", 
		   url: "login.php", 
		   data: "login="+$("#login").val()+"&mdp="+$("#mdp").val(), 
		   success: function(msg){ 
					$("div#retour").html(msg);
				
		   }
		});
		return false; //empèche la soumission du formulaire
	});
});
</script>