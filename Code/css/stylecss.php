<style>

#Contenu{
    display:flex;
    flex-wrap: nowrap;
    justify-content: center;
    width:100%;
    margin-top: 1%;
}

#Contenu-milieu{
    width:750px;
    height:3000px;
    margin: 0 auto;
    margin-left: 22px;
    margin-right: 22px;
}
h1{
    font-size: 35px;
}
.picture{
    width:100%;
    border-radius: 15px;
    cursor:pointer;
}
.presentation-haut{
    width:100%;
}
.titre{
    width:90%;
}
.icon{
    width:100%;
    transform: rotate(120deg);
}
.presentation{
    display:flex;
    flex-wrap: wrap;
}
.notation{
    width:20%;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-direction:column;
}
.presentation-bas{
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    width:100%;
    justify-content: space-between;
    height:75px;
    margin-top:15px;
}
.recette_info{
    width:100%;
    display:flex;
}
.recette_info *{
    font-size:15px;
}
.recette_info_gauche{
    width:35%;
    display:flex;
}
.recette_info_droite{
    width:35%;
    display:flex;
}
.info{
    width:150px;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
    flex-direction:column;
}
.info_img{
    width:30px;
    height:30px;
}
.info_txt{
    font-size: 13px;
}
span{
    font-size: 20px;
}
.photo{
    display: flex;
    align-items: center;
    justify-content: center;
}
.etoile{
    width:50%;
}
.img_etoile{
    width:15px;
    height:15px;
}
.note_recette{
    font-size: 22px;
}
.note_recette_max,.nbr_notes{
    font-size: 12px;
}
/*-------------  Options de la recette ---------------*/
.conteneur_options{
    margin-top: 18px;
    display:flex;
    flex-direction: row;
    justify-content: space-between;
    width:100%;
    height:60px;
}

.bouton_sauvegarde{
    display: flex;
    justify-content:center;
    border-radius: 7%;
    border:3px solid black;
    background:none;
    width:60px;
}
button{
    width:100%;
    display: flex;
    align-items: center;
    cursor:pointer;
    justify-content: center;
    height: 60px;
}
button>img{
    width:30px;
}
#pdf{
    background:none;
    border:3px solid black;
    border-radius: 7%;
    width:60px;

}
.fonctionnalites{
    width:40%;
    display:flex;
    justify-content:center;
    align-items:center;
}
button>span{
    color:white;
    padding-left: 7px;
}

/*------------------------------- Ingredients --------------------------*/
.conteneur_ingredients{
    margin-top:45px;
}
.ingredients_contenu{
    margin-top:50px;
    display: flex;
    width: 100%;
    flex-direction: column;
    flex-wrap: nowrap;
    margin-left:20px;
}
.portions{
    display: flex;
    flex-direction: row;
    width:100%;
    justify-content: center;
}
.portions_nbr{
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    width: 200px;
    align-items: center;
}
.portions>button{
    width:40px;
    height: 40px;
    background: none;
    background-color: #ffa7a7;
    border: 1px solid grey;
    border-radius: 50%;
    box-shadow: 1px 2px 3px rgb(157 170 177 / 50%);
}

/*------------------------Préparation---------------------*/
/* Rappel de temps pour la recette*/

.conteneur_preparation{
    margin-top:60px;
}
.rappel_temps_recette{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    width:40%;
}
.preparation_temps{
    font-weight: bold;
}
.rappel_temps_recette span{
    font-size: 17px;
}
.cont_titre{
    width:60%;
}
.cont_titre_temps{
    display:flex;
}
.rappel_temps_recette div{
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
}

/*Etape recette*/
.etape_de_la_recette{
    width:75%;
    margin-top: 35px;
}
.conteneur_etape{
    display:flex;
    flex-direction:column;
}
.nbrEtape{
    height:70px;
}
/*------------------Nutrition----------------*/
.nutrition_stats{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}
.nutrition_stats_obj{
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
    border:2px solid grey;
    border-radius:50%;
    width:120px;
    height:120px;
    box-shadow: 1px 2px 3px rgb(157 170 177 / 50%);
}
.nbr_stats{
    font-weight: bold;
}

/*-----------------------Commentaires----------------*/
.conteneur_titre_nbr_de_com{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: flex-start;
}

.nbr_de_com{
    margin-left: 10px;
}
.commentaires_reaction>button{
    background: none;
    border:none
}
.commentaires_reaction{
    display: flex;
    flex-direction: row;
    justify-content: start;
    width:115px;
    height:30px;
    align-items: center;
}

.bouton_aimer_img,.bouton_pas_ouf_img{
    width:22px;
    height:22px;
}
.bouton_pas_ouf_img{
    margin-top: 7px;
}
.commentaires_reaction span{
    color:grey;
    font-size: 15px;
}
.conteneur_commentaires{
    margin-top:45px;
}
.commentaires{
    border-left:2px solid grey;
    border-bottom: 2px solid grey;
    border-bottom-left-radius: 15px;
    display:flex;
    flex-direction: column;
    margin-top:40px;
}
.commentaires_infos{
    display:flex;
    flex-direction:row;
    width:700px;
    margin-bottom:15px;
}
.profil_user{
    width:20%;
    display:flex;
}
.com_desc{
    width:80%;
}
.enfant{
    margin:auto;
}
/* Astuces */
.conteneur_astuces{
    margin-top:35px;
}
.astuces{
    margin-top:40px;
}
/* Histoire */
.conteneur_histoire{
    margin-top:50px;
}
.histoire{
    margin-top:40px;
}

/* Css pour la page PDF */

.nomMarque{
    width:100%;
}

#pagePDF{
    display: none;
}
#conteneur_pdf{
    width:800px;
    height:842px;
}
.cont_pdf{
    display:flex;
    width:100%;
    flex-direction: row;
    flex-wrap:nowrap;
}
#conteneur_pdf .ingredients_contenu{
    margin-top:0%;
}
.pdf_gauche{
    width:40%;
}
.pdf_droite{
    width:60%;
}
#pagePDF *{
    font-size:12px;
}
</style>
