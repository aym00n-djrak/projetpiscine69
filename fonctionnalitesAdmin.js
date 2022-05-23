function affichageInitialBoutonsSansFormulaires() {
    $(document).ready(function () {
        $(".formulaireAjoutMedecin").hide();
        $(".formulaireSupprimerMedecin").hide();
        $(".formulaireModifMedecin").hide();
    });
}

function affichageFormulaireAjoutMedecin() {
    $(document).ready(function () {
        $(".formulaireAjoutMedecin").show();
        $(".formulaireSupprimerMedecin").hide();
        $(".formulaireModifMedecin").hide();
    });
}

function affichageFormulaireSupprimerMedecin() {
    $(document).ready(function () {
        $(".formulaireAjoutMedecin").hide();
        $(".formulaireSupprimerMedecin").show();
        $(".formulaireModifMedecin").hide();
    });
}

function affichageFormulaireModifMedecin() {
    $(document).ready(function () {
        $(".formulaireAjoutMedecin").hide();
        $(".formulaireSupprimerMedecin").hide();
        $(".formulaireModifMedecin").show();
    });
}