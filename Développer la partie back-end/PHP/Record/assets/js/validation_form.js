
// Création des variables de recherche des elements par ID
const form = document.getElementById('form');
const title = document.getElementById('title');
const year = document.getElementById('year');
const picture = document.getElementById('picture');
const label = document.getElementById('label');
const genre = document.getElementById('genre');
const price = document.getElementById('price');
const artistname = document.getElementById('artistid');

//Creation tableau d'erreur
var tab= [];

form.addEventListener('focusout',(e)=>{
    e.preventDefault();
    checkInputs();
});


// verification des valeurs des inputs
function checkInputs(){
    const titleValue = title.value.trim();
    const yearValue = year.value.trim();
    const pictureValue = picture.value.trim();
    const labelValue = label.value.trim();
    const genreValue = genre.value.trim();
    const priceValue = price.value.trim();
    const aristnameValue = artistname.value.trim();

    ///////////////////////////////////////////
    ////   VERIFICATION DES CHAMPS ///////////
    /////////////////////////////////////////


    //TITLE
    if(titleValue === '') {
        tab['title'] = "faux";
        erreurMsg(title, 'le titre ne peut être vide');
    }else if(!regTitle(titleValue)){
        tab['title'] = "faux";
        erreurMsg(title, 'le titre n\'est pas conforme');
    }
    else{
            successMsg(title,'c\'est correct!');
        }

    // YEAR
    if(yearValue === '') {
        tab['year'] = "faux";
        erreurMsg(year, 'l\'année ne peut être vide');
    }else if(!regYear(yearValue)) {
        tab['year'] = "faux";
        erreurMsg(year, 'le prix n\'est pas valide');
    }else{
        successMsg(year,'c\'est correct!');
    }

    // PICTURE
    if(pictureValue === '') {
        tab['picture'] = "faux";
        erreurMsg(picture, 'l\'image ne peut être vide');
    }else{
        successMsg(picture,'c\'est correct!');
    }

    //LABEL
    if(labelValue === '') {
        tab['label'] = "faux";
        erreurMsg(label, 'le label ne peut être vide');
    }else if(!regLabel(labelValue)){
        tab['label'] = false;
            erreurMsg(label, 'le label n\'est pas conforme');
        }else{
        successMsg(label,'c\'est correct!');
    }

    //GENRE
    if(genreValue === '') {
        tab['genre'] = "faux";
        erreurMsg(genre, 'le genre ne peut être vide');
    }else if(!regGenre(genreValue)){
        tab['genre'] = "faux";
        erreurMsg(genre, 'le genre n\'est pas conforme');
    }else{
        successMsg(genre,'c\'est correct!');
    }

    //PRICE
    if(priceValue === '') {
        tab['price'] = "faux";
        erreurMsg(price, 'le prix ne peut être vide');
    }else if(!regPrice(priceValue)) {
        tab['price'] = "faux";
        erreurMsg(price, 'le prix n\'est pas valide');
    }else{
        successMsg(price,'c\'est correct!');
    }
    //ARTISTNAME
    if(aristnameValue === '') {
        tab['artistid'] = "faux";
        erreurMsg(artistname, 'le nom d\'artiste ne peut être vide');
    }else{
        successMsg(artistname,'c\'est correct!');
    }

}
////////////////////////////
/////    REGEX  ///////////
//////////////////////////



function regLabel(label){
    return /^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/.test(label);
}

function regGenre(genre){
    return /^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/.test(genre);
}

function regTitle(title){
    return /^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/.test(title);
}
function regPrice(price){
    return /^\d{1,3}(?:[.,]\d{3})*(?:[.,]\d{2})$/.test(price);
}

function regArtistName(artistname) {
    return /^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/.test(artistname);
}

function regYear(year){
    return /^\d{1,4}$/.test(year);
}




function erreurMsg(input,message){
    const formGroup = input.parentElement;
    const small = formGroup.querySelector('small');
    //ajout du msg d'erreur dans la balise small
    small.innerText = message;
    //ajout de la classe error
    formGroup.className = 'form-group error';
}

function successMsg(input,message){
    const formGroup = input.parentElement;
    const small = formGroup.querySelector('small');
    small.innerText = message;
    formGroup.className = 'form-group success';
}