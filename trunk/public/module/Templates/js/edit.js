
  $(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      /*
      $('a[title]').tooltip({container:'body'});
    	$('.dropdown-menu input').click(function() {return false;})
		    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});
      */
      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if ("onwebkitspeechchange"  in document.createElement("input")) {
        var editorOffset = $('#editor').offset();
        $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      } else {
        $('#voiceBtn').hide();
      }
	};
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	};
    initToolbarBootstrapBindings();  
	$('#editor').wysiwyg({ 
            fileUploadError: showErrorAlert
        });
    window.prettyPrint && prettyPrint();
  });
  
  
  
  $('.draggable').draggable({
      revert: true,
      start: function(){
          
      },
      drag: function(){
          $(this).addClass("shadow-yellow");
          $("#editor").css("border", "1px solid #fcefa1");
      },
      stop: function(){
          $(this).removeClass('shadow-yellow');
          $("#editor").css("border","1px solid rgb(204, 204, 204)")
      }
  });
  
  $('.droppable').droppable({
    accept: ".draggable",
    drop: function(event, ui){
        console.log($(ui.draggable[0]).attr('data-ftfName'));
        $("#editor").wysiwyg().append('{' + $(ui.draggable[0]).attr('data-ftfName') + '}');
        // $("#editor").wysiwyg().val($("#editor").wysiwyg().val() + '{' + $(ui.draggable[0]).attr('data-ftfName') + '}');
    }
  });
  
  $("#editor").keyup(function(){
      $("#documentTemplateContent").val($("#editor").wysiwyg().cleanHtml());
  });
  
  $('.cmd-delete').click(function(){ 
      $(this).closest('tr').remove(); 
      return false;
  });
  
  $('.cmd-add-field').click(function(){
      // $('#form_templates tbody').children(':last').clone().appendTo($('#form_templates tbody'));
      var row = $('#form_templates tbody').children(':last').clone();
      row.find('input').val('');
      row.find('select').val('');
      row.appendTo($('#form_templates tbody'));
      return false;
      // console.log($('#form_templates tbody').children(':last').clone().find('input'));
  });
  
  // $(".droppable").droppable({ drop: function(){ $("#editor").wysiwyg().append($(this).attr("data-ftfName")); }});