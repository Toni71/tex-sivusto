


function magnifier() {

    this.magnifyImg = function(ptr, magnification, magnifierSize) {
      let $pointer;
      if (typeof ptr == "string") {
        $pointer = $(ptr);
      } else if (typeof ptr == "object") {
        $pointer = ptr;
      }
      
      // Tarkistetaan, onko elementti luokassa "test4567"
      if (!$pointer.hasClass('test4567')) {
        alert('Object must have class "test4567".');
        return false;
      }
  
      magnification = +(magnification);
  
      $pointer.hover(function() {      $(this).css('cursor', 'none');
        $('.magnify').show();
        //Setting some letiables for later use
        let width = $(this).width();
        let height = $(this).height();
        let src = $(this).attr('src');
        let imagePos = $(this).offset();
        let image = $(this);
  
        if (magnifierSize == undefined) {
          magnifierSize = '150px';
        }
  
        $('.magnify').css({
          'background-size': width * magnification + 'px ' + height * magnification + "px",
          'background-image': 'url("' + src + '")',
          'width': magnifierSize,
          'height': magnifierSize
        });
  
        //Setting a few more...
        let magnifyOffset = +($('.magnify').width() / 2);
        let rightSide = +(imagePos.left + $(this).width());
        let bottomSide = +(imagePos.top + $(this).height());
  
        $(document).mousemove(function(e) {
          if (e.pageX < +(imagePos.left - magnifyOffset / 6) || e.pageX > +(rightSide + magnifyOffset / 6) || e.pageY < +(imagePos.top - magnifyOffset / 6) || e.pageY > +(bottomSide + magnifyOffset / 6)) {
            $('.magnify').hide();
            $(document).unbind('mousemove');
          }
          let backgroundPos = "" - ((e.pageX - imagePos.left) * magnification - magnifyOffset) + "px " + -((e.pageY - imagePos.top) * magnification - magnifyOffset) + "px";
          $('.magnify').css({
            'left': e.pageX - magnifyOffset,
            'top': e.pageY - magnifyOffset,
            'background-position': backgroundPos
          });
        });
      }, function() {
  
      });
    };
  
    this.init = function() {
      $('body').prepend('<div class="magnify"></div>');
    }
  
    return this.init();
  }
  

    let magnifierSize = 150;
    let magnification = 2;
  
  // Tarkistetaan, onko sivustoa käytetty mobiililaitteella
var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

// Jos on mobiili, käytetään erillistä mobiilikoodia
if (isMobile) {
  // Lisää mobiilikoodi tähän
} else {
  // Jos ei ole mobiili, käytetään alkuperäistä koodia
  var magnify = new magnifier();
  magnify.magnifyImg('.test4567', magnification, magnifierSize);
}

    // function 2
  
    const mainImage = document.getElementById("main-image");
    const smallImages = document.querySelectorAll(".small-image");
    const mainSmallImage = document.getElementById("main-small-image");
    
    smallImages.forEach(smallImage => {
        smallImage.addEventListener("click", () => {
            mainImage.src = smallImage.src;
        });
    });
    
    // Hae kuvan src-arvo
    const kuvaLahde = mainImage.src;
    mainSmallImage.addEventListener("click", () => {
        mainImage.src = kuvaLahde;
    });
  
  