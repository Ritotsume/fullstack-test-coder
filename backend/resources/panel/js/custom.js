/**
 * Custom ...
 *
 */

 $(function () {
  // deleta a imagem na view para que seja deletada no banco...
  let $deleteImage = $('.deleteimage');
  $deleteImage.on('click', function () {
    let $inputImage = $(this).siblings('input[type=hidden]');
    let $image = $(this).siblings('img');
    // let imageSRC = $inputImage.val();
    $inputImage.val('');
    $image.attr('src', '');
    $image.hide();
    $(this).closest('div.thumbwrapper').hide();
  });

  // cria slug.
  let $slugField = $('input.slug');
  let $inputTitle = $('input.title');
  $inputTitle.on('keyup', function () {
    let text = $(this).val();
    let slug = text
                .toLowerCase()
                .replace(/[ ]+/g, '-')
                .replace(/[áàãâä]+/g, 'a')
                .replace(/[éèêë]+/g, 'e')
                .replace(/[íìîï]+/g, 'i')
                .replace(/[óòõôö]+/, 'o')
                .replace(/[úùûü]+/g, 'u')
                .replace(/[ç]+/g, 'c')
                .replace(/[\\,(),;:|!"#$%&\/=?~^><ªº\.]+/g, '');
    $slugField.val(slug);
  });

  // mostra em um pequeno 'span' a imagem que será atribuída...
  let $spanImage = $('span.file-input-str-image');
  let $fileInputImage = $('input[type=file].custom-file-input#image');
  $fileInputImage.on('change', function () {
    $spanImage.text($(this).val());
  });  
});
