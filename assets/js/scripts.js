$(document).ready(function(){
  $("#memeModal").on('show.bs.modal', function(e){
    var meme  = $(e.relatedTarget);
    var modal = $(this);
    modal.find(".modal-title").html(meme.data("name"));
    var img = loadRaw(meme.data("type"), meme.data("link"));
    modal.find(".modal-body .meme").append(img);
    modal.find('[name="id"]').val(meme.data("mid"));
    modal.find('[name="name"]').val(meme.data("name"));
    if(meme.data("tags")){
      meme.data("tags").forEach(function(e){
        modal.find('[name="tags"]').val(modal.find('[name="tags"]').val()+e+'\n');
      });
    }
  });
  $("#memeModal").on('hide.bs.modal', function(e){
    var modal = $(this);
    modal.find(".modal-title").html("");
    modal.find(".modal-body .meme").html("");
    modal.find('[name="id"]').val("");
    modal.find('[name="name"]').val("");
    modal.find('[name="tags"]').val("");
  })
});
function loadRaw(type, link){
  if(type == "image/gif" || type == "image/jpeg" || type == "image/png"){
    var image = $(document.createElement("img")).attr({
      'src': link,
      'class': 'rawMeme'
    });
  }
  return image;
}
function loadMeme(m, clipboard){
  var column = $(document.createElement("div")).addClass('col-2');
  var card = $(document.createElement("div")).addClass('card');
  var meme = $(document.createElement("div")).addClass('Meme');
  var cardBody = $(document.createElement("div")).addClass('card-body');
  var name = $(document.createElement("p")).addClass("card-text").attr({
    'data-toggle': 'modal',
    'data-target': '#memeModal',
    'data-mid': m.id,
    'data-name': m.name,
    'data-type': m.type,
    'data-link': m.link,
    'data-tags': m.tags
  }).html(m.name);
  var img = $(document.createElement("img")).addClass('card-img-top').attr('src',m.link);
  if(clipboard)
    meme.attr('data-clipboard-text', m.link);
  else
    img.attr({
      'data-toggle': 'modal',
      'data-target': '#memeModal',
      'data-mid': m.id,
      'data-name': m.name,
      'data-type': m.type,
      'data-link': m.link,
      'data-tags': m.tags
    });
  var overflow = $(document.createElement("span")).addClass("hideOverflow");
  overflow.append(img);
  meme.append(overflow);
  cardBody.append(name);
  card.append(meme);
  card.append(cardBody);
  column.append(card);
  $('.memes.row').append(column);
}
