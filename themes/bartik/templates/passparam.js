function affichage() {
   FenetreAffichage = window.open('','NouvelleFenetre', 'toolbar=no,status=no,width=300,height=200')
   FenetreAffichage.document.write("Voici votre bon de commande");
   FenetreAffichage.document.write("<br><br><b>Pseudo : </b>" + document.formulaire1.nom.value);
   FenetreAffichage.document.write("<br><b>Votre site : </b>" + document.formulaire1.adresse.value);
   FenetreAffichage.document.write("<br><b>Votre E-mail: </b>" + document.formulaire1.email.value);
   FenetreAffichage.document.write("<br>");
}