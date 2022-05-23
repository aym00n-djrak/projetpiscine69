function affichageInitialBoutonsSansFormulaires() {
    $(document).ready(function () {
        $(".formulaireAjoutMedecin").hide();
        $(".formulaireModifMedecin").hide();
    });
}

function affichageFormulaireAjoutMedecin() {
    $(document).ready(function () {
        $(".formulaireAjoutMedecin").show();
        $(".formulaireModifMedecin").hide();
    });
}

function affichageFormulaireModifMedecin() {
    $(document).ready(function () {
        $(".formulaireAjoutMedecin").hide();
        $(".formulaireModifMedecin").show();
    });
}