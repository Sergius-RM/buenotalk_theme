jQuery.noConflict(); (function($) {


    function toggleForm() {
      searchForm.classList.toggle('active');
    }

    document.addEventListener('DOMContentLoaded', function() {
        const catBox = document.querySelector('.cat_box');
        const popup = catBox.querySelector('.cat_popup');
        const closeButton = popup.querySelector('.close_popup');

        catBox.addEventListener('click', function() {
            popup.style.display = 'block';
            catBox.classList.add('cat_fly');
        });

        closeButton.addEventListener('click', function(e) {
            e.stopPropagation(); // Предотвращаем всплытие события, чтобы не закрывался сразу после открытия
            popup.style.display = 'none';
            catBox.classList.remove('cat_fly');
        });
    });

  ///tiny-slider
  $('.slide_list').each(function (index, element) {
    var slider = tns({
      container: element,
      autoHeight: true,
      items: 1,
      loop: true,
      swipeAngle: false,
      speed: 500,
      mouseDrag: true,
     // autoplay: true,
      controls: true,
      nav: false,
    });
  });


})(jQuery);
