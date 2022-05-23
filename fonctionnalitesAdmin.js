function affichageInitialBoutonsSansFormulaires() {
    $(document).ready(function () {
        $(".formulaireAjoutMedecin").hide();
        $(".formulaireAjoutLabo").hide();
    });
}

function affichageFormulaireAjoutMedecin() {
    $(document).ready(function () {
        $(".formulaireAjoutMedecin").show();
        $(".formulaireAjoutLabo").hide();
    });
}

function affichageFormulaireAjoutLabo(){
    $(document).ready(function () {
        $(".formulaireAjoutLabo").show();
        $(".formulaireAjoutMedecin").hide();
    });
}