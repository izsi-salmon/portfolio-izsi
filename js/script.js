// ----------- DOM QUERIES -----------
// Project menu
var scrollMessage = document.getElementById('scrollMessage');
var projectBlock = document.getElementsByClassName('project-block');
var projectImg = document.getElementsByClassName('project-img-container');
var projectTitle = document.getElementsByClassName('project-title');
var projectText = document.getElementsByClassName('project-text');
var projectDetails = document.getElementsByClassName('project-text-details');

// Icon links
var iconLink = document.getElementsByClassName('icon-link');
var iconLinkIcon = document.getElementsByClassName('icon-link-icon');

// Modal
var imageContainer = document.getElementById('imageContainer');

// ----------- FUNCTIONS -----------


// --- SCROLL MESSAGE ---

if(scrollMessage){
    
    function showScrollMessage(){
        if(window.pageYOffset == 0) {
            scrollMessage.style.opacity = 1;
            scrollMessage.style.transform = 'translateY(0)';
        }
    }

    function hideScrollMessage(){
        scrollMessage.style.opacity = 0;
    }

    window.onload = function(){
        setTimeout(showScrollMessage, 4000);
    };
    window.onscroll = hideScrollMessage;
    
}

// --- HIDE/SHOW PROJECT DETAILS ---

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

// --- SPIN ICON ---

function spinIcon(y) {
//    iconLinkIcon[y].style.transform = 'rotateY(360deg)';
    iconLinkIcon[y].classList.add('icon-link-icon-spin');
    iconLink[y].addEventListener('mouseout', function(){resetIcon(y);}, false);
}

function resetIcon(y) {
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

// --- MODAL ---

function initModal(){

    var increment;
    var modalOpen = false;

    // OPEN
    $('.project-thumbnail').click(function(){
        increment = this.id;
        $('.drop-shadow').css('display', 'flex');
        imageContainer.innerHTML = '<img src="'+imagesArray[this.id]+'">';
        if($('.modal-thumbnail').hasClass('active-image')){
            $('.modal-thumbnail').removeClass('active-image');
        }
        $('#'+increment+'thumbnail').addClass("active-image");
        $('body').css('overflow', 'hidden');
        modalOpen = true;
    });

    // CLOSE
    function closeModal(){
        $('body').find('.drop-shadow').css('display', 'none');
        $('body').css('overflow', 'auto');
        modalOpen = false;
    }

    $('.drop-shadow').click(function(event) {
        if (!$(event.target).closest('#modalContent').length && !$(event.target).closest('.chevron').length ) {
          closeModal();
        }
    });

    // Next Image

    function nextImage(){
        ++increment;
        if(increment === imagesArray.length){
          increment = 0;
          imageContainer.innerHTML = '<img src="'+imagesArray[increment]+'">';
        } else{
          imageContainer.innerHTML = '<img src="'+imagesArray[increment]+'">';
        }
        if($('.modal-thumbnail').hasClass('active-image')){
            $('.modal-thumbnail').removeClass('active-image');
        }
        $('#'+increment+'thumbnail').addClass("active-image");
    }


    // Previous Image

    function prevImage(){
        --increment;
        if(increment === -1){
          increment = (imagesArray.length - 1);
          imageContainer.innerHTML = '<img src="'+imagesArray[increment]+'">';
        } else{
          imageContainer.innerHTML = '<img src="'+imagesArray[increment]+'">';
        }
        if($('.modal-thumbnail').hasClass('active-image')){
            $('.modal-thumbnail').removeClass('active-image');
        }
        $('#'+increment+'thumbnail').addClass("active-image");
    }
    
    $(document).keydown(function(e) {
        if (modalOpen === true) {

            if (e.keyCode === 37) {
              prevImage();
            } else if (e.keyCode === 39){
              nextImage();
            } else if (e.keyCode === 27){
              closeModal();
            }

        }
    });
    
    // Select Image
    
    //    function selectImage(id){
    //        imageContainer.innerHTML = '<img id="image'+imagesArray[id]+'" src="'+imagesArray[id]+'">';
    //    }
    
    $('.modal-thumbnail').click(function(){
        var id = this.id;
        var increment  = parseInt(id);
        imageContainer.innerHTML = '<img id="image'+imagesArray[increment]+'" src="'+imagesArray[increment]+'">';
        if($('.modal-thumbnail').hasClass('active-image')){
            $('.modal-thumbnail').removeClass('active-image');
        }
        $('#'+id+'').addClass("active-image");
    });
}

window.onload = function(){
    if(imageContainer){
        initModal();
    }
};