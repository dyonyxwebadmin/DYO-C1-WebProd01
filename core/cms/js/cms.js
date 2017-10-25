// JavaScript Document

$('.cms').click(function(){

	var block = this.id;

	var cmsModal =
	  '<div id="cmsEdit" class="modal fade">' +
	  '  <div class="modal-dialog">' +
	  '    <div class="modal-content">' +
	  '      <div class="modal-header">' +
	  '        <button type="button" class="close" data-dismiss="modal">&times;</button>' +
	  '        <h4 class="modal-title">Edit Content</h4>' +
	  '      </div>' +
	  '      <div class="modal-body"><textarea id="cms-edit" name="'+this.id+'" class="form-control">' + this.innerHTML + '</textarea></div>' +
	  '      <div class="modal-footer">' +
	  '        <div class="btn btn-primary" onclick="cmsSave();">Save</div>' +
	  '        <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>' +
	  '      </div>' +
	  '    </div>' +
	  '  </div>' +
	  '</div>';
	$(cmsModal).modal();
});

function cmsSave() {

	var content = $("#cms-edit").val();
	var block = $("#cms-edit").attr("name");

	console.log(content);
	console.log(block);

	$("#"+block).html(content);
	
	var path = document.URL.replace("http://", "").replace("https://", "").replace(document.domain, "").replace("#", "")
		
	$.post('/core/cms/set.php',{
			path: path,
			block: block,
			content: content
		},
		function(data) {

		}
	);
	$("#cmsEdit").modal('hide');
	$('#cmsEdit').on('hidden.bs.modal', function (e) {
	 	$("div").remove('#cmsEdit');
	})
	
}

