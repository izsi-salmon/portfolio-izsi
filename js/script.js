var projectBlock = document.getElementsByClassName('project-block');
var projectImg = document.getElementsByClassName('project-img-container');
var projectTitle = document.getElementsByClassName('project-title');
var projectText = document.getElementsByClassName('project-text');
var projectDetails = document.getElementsByClassName('project-text-details');

function showDetails(x) {
    projectBlock[x].classList.add('project-block-on');
}

function loopEventListenerFunction() {
    var i;
    for (i = 0; i < projectBlock.length; i++) {
            setEventListeners(i);
    }
}
loopEventListenerFunction();

function setEventListeners(x){
    projectImg[x].addEventListener('mouseover', function(){showDetails(x);}, false);
    projectTitle[x].addEventListener('mouseover', function(){showDetails(x);}, false);
    
    document.addEventListener('mouseover', function(event) {
        var imgTarget = projectImg[x].contains(event.target);
        var textTarget = projectText[x].contains(event.target);

        if (!imgTarget && !textTarget) {
            projectBlock[x].classList.remove('project-block-on');
        }
    });
}