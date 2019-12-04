// Project menu
var projectBlock = document.getElementsByClassName('project-block');
var projectImg = document.getElementsByClassName('project-img-container');
var projectTitle = document.getElementsByClassName('project-title');
var projectText = document.getElementsByClassName('project-text');
var projectDetails = document.getElementsByClassName('project-text-details');

// Icon links
var iconLink = document.getElementsByClassName('icon-link');
var iconLinkIcon = document.getElementsByClassName('icon-link-icon');

function showDetails(x) {
    projectBlock[x].classList.add('project-block-on');
}

function loopEventListenersProjectsFunction() {
    var i;
    for (i = 0; i < projectBlock.length; i++) {
            setEventListenersProjects(i);
    }
}
loopEventListenersProjectsFunction();

function setEventListenersProjects(x){
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

function spinIcon(y) {
    console.log('add running');
//    iconLinkIcon[y].style.transform = 'rotateY(360deg)';
    iconLinkIcon[y].classList.add('icon-link-icon-spin');
    iconLink[y].addEventListener('mouseout', function(){resetIcon(y);}, false);
}

function resetIcon(y) {
    console.log('remove running');
    iconLinkIcon[y].classList.remove('icon-link-icon-spin');
}

function loopEventListenersLinksFunction() {
    var i;
    for (i = 0; i < iconLink.length; i++) {
            setEventListenersLinks(i);
    }
}
loopEventListenersLinksFunction();

function setEventListenersLinks(y){
    iconLink[y].addEventListener('mouseover', function(){spinIcon(y);}, false);
    iconLink[y].addEventListener('mouseover', function(){spinIcon(y);}, false);
}