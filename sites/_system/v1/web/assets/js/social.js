
var post_count = 140
var id = 0,
	category_id =0;	

var $grid = $('#social');
	
function countChar() {
	var len = $("#post").val().length;
	if (len >= post_count) {
		val.value = val.value.substring(0, post_count);
	} else {
		$('#post-count').text(post_count - len);
	}
};

function AddUrlToPost()
{
	$("#post").val($("#post").val() + " " + short_url);
	countChar();
}

function AddTagToPost(t)
{
	$("#post").val($("#post").val() + " " + t);
	countChar();
}
	
function AddUrl()
{
	$.post('/api/social/user.add.url',{
			url: $("#url").val()
		},
		function(data) {
			location.reload();
		}
	);			
}

function setPostPerDay(v)
{
	$.post('/api/social/social.settings.php',{
			k: 'post_per_day',
			v: v
		},
		function(data) {
		}
	);		
}

function getPosts()
{
	$.post('/api/social/post.list.php',{
			category_id: 'recent'
		},
		function(data) {
			$("#list-recent-posts").empty()
			var header = '<tr><th>Category</th><th>Post</th><th></th></tr>';
			$("#list-recent-posts").append(header);
			
			var json = $.parseJSON(data);
			
			var html = $.map(json, function (item, i) {
				
				return '<tr><td style="vertical-align:middle">' + item.category + '</td>\
							<td style="vertical-align:middle">' + item.post + '</td>\
							<td class="text-center" style="vertical-align:middle">\
								<a href="javascript:;" class="btn btn-xs btn-primary" onclick="AddToQue(\'' + item.id + '\');">Add to Que</i></a>\
								<a href="javascript:;" class="btn btn-xs btn-success" onclick="PostNow(\'' + item.id + '\');">Post Now</i></a>\
							</td>\
						</tr>';
			}).join("");
			
			$("#list-recent-posts").append(html);
		}
	);	
}

function getProfiles()
{
	$.post('/api/social/user.social.list.php',{
		},
		function(data) {
			$("#list-user-social").empty()
			var header = '<tr><th></th><th>Type</th><th>Username</th><th></th></tr>';
			$("#list-user-social").append(header);
			
			var json = $.parseJSON(data);
			
			var html = $.map(json, function (item, i) {
				
				if (item.post_per_day)
				{
					$( "#incrementSlider" ).slider("value", item.post_per_day);
					$( "#incrementAmount" ).text (item.post_per_day);
				}
				return '<tr><td class="col-md-1"><i class="fa fa-' + item.type + '"></i></td>\
							<td class="col-md-2">' + item.type + '</td>\
							<td>' + item.namespace + '</td>\
							<td class="text-center col-md-1">\
								<a href="javascript:;" class="btn btn-xs btn-danger" onclick="DeleteProfile(\'' + item.id + '\');"><i class="fa fa-times"></i></a>\
							</td>\
						</tr>';
			}).join("");
			
			$("#list-user-social").append(html);
			
		}
	);	
}

function DeleteProfile(ProfileID) {	
	$.post('/api/social/social.profile.delete.php',{
			profile_id: ProfileID
		},
		function(data) {
			getProfiles();
		}
	);	
}


function getTags()
{
	$.post('/api/social/social.tag.list.php',{
			category_id: 'recent'
		},
		function(data) {
			$("#tag-select").empty()
			var json = $.parseJSON(data);
			
			var html = $.map(json, function (item, i) {					
				return '<li><a href="javascript:;" onclick="AddTagToPost(\'' + item.tag + '\');">' + item.tag + '</a></li>';
			}).join("");
			
			$("#tag-select").append(html);
		}
	);	
}
function getCategories()
{
	$.post('/api/social/category.list.php',{
			category_id: 'recent'
		},
		function(data) {
			$("#category-select").empty()
			var json = $.parseJSON(data);
			
			var html = $.map(json, function (item, i) {					
				return '<li><a href="javascript:;" onclick="selectCategory(\'' + item.id + '\', \'' + item.name + '\');">' + item.name + '</a></li>';
			}).join("");
			
			$("#category-select").append(html);
		}
	);	
}
function selectCategory(cid, name) {
	$("#category-selected").html(name + '  <span class="caret"></span>');
	category_id = cid;

}
function PostNow(post_id)
{
	if (!post_id) {
		post_id = id;
	}
	$.post('/api/social/social.post.php',{
			post_id: post_id,
			post_text: ''
		},
		function(data) {
			$('#modal-post').modal('hide');
    		$.gritter.add({
				title: "Message Posted",
				text: "Your message was posted to all your social profiles on record.",
				after_open: function(manual_close){
					userProfile();
					$('#modal-edit-profile').modal('hide');
				}
			});	 
		}
	);	
}
function AddToQue(post_id)
{
	if (!post_id) {
		post_id = id;
	}
	$.post('/api/social/social.queue.php',{
			post_id: post_id,
			post_text: ''
		},
		function(data) {
			$('#modal-post').modal('hide');
    		$.gritter.add({
				title: "Message Queued",
				text: "Your message is in the social queue ready to go!",
				after_open: function(manual_close){
					userProfile();
					$('#modal-edit-profile').modal('hide');
				}
			});	 
		}
	);	
}

function QuickPost()
{
	$.post('/api/social/social.post.php',{
			post_id: '',
			post_text: $("#post").val()
		},
		function(data) {
			$("#post").val("");
    		$.gritter.add({
				title: "Message Posted",
				text: "Your message was posted to all your social profiles on record.",
				after_open: function(manual_close){
					userProfile();
					$('#modal-edit-profile').modal('hide');
				}
			});	 
		}
	);	
}

function QuickAddToQue(post_id)
{
	$.post('/api/social/social.queue.php',{
			post_id: '',
			post_text: $("#post").val()
		},
		function(data) {
			$("#post").val("");
    		$.gritter.add({
				title: "Message Queued",
				text: "Your message is in the social queue ready to go!",
				after_open: function(manual_close){
					userProfile();
					$('#modal-edit-profile').modal('hide');
				}
			});	 
		}
	);	
}
	
function getCategoryList()
{
	$.post('/api/social/category.list.php',{
		},
		function(data) {
			$("#category-list-table").empty()
			var header = '<tr><th>id</th><th>Name</th><th></th></tr>';
			$("#category-list-table").append(header);
			
			json = $.parseJSON(data);
			
			var html = $.map(json, function (item, i) {
				
				return '<tr><td class="col-md-1">' + item.id + '</td>\
							<td>' + item.name + '</td>\
							<td class="text-center col-md-1">\
								<a href="javascript:;" class="btn btn-danger btn-xs" onclick="deleteCategory(\'' + item.id  + '\');"> <i class=" fa fa-times"></i></a>\
							</td>\
						</tr>';
			}).join("");
			
			$("#category-list-table").append(html);
		}
	);	
}
	
function deleteCategory(CategoryID) {
	$.post('/api/social/category.delete.php',{
			id: CategoryID
		},
		function(data) {
			getCategoryList();
		}
	);	
}

function SubmitEdit()
{
	var isValid = true;

	if (isValid)
	{
		isValid = formValid($("#view-name"), "required", "name");
	}	
	if (isValid)
	{
		// Type: 1 = customer, 2 = team member, 3 = team leader, 5 = admin
		
		$.post('/api/category.edit',{
				id: current_id,
				name: $("#view-name").val()
			},
			function(data) {
				var json = $.parseJSON(data);
				if (json.status == "failed") {
					$.msgbox(json.message, {type: "error"});
				} else {
					$.msgbox("Your changes have been saved.", {
						type: "confirm",
						buttons : [
							{type: "cancel", value: "View Changes"},
							{type: "submit", value: "Return to List"}
						]
					}, function(result) {
						if (result == "Return to List")
						{
							window.location = "/dashboard/manage/categories.php";
						}
					});
				}

			}
		);
	}
	else
	{
	}
	return false;
}

function addCategory()
{
	// Type: 1 = customer, 2 = team member, 3 = team leader, 5 = admin
	
	$.post('/api/social/category.create.php',{
			name: $("#category-name").val()
		},
		function(data) {
			var json = $.parseJSON(data);
			if (json.status == "failed") {
				$.gritter.add({
					title: 'Error Saving Information.',
					text: 'There was a problem saving your information. ',
					sticky: false,
					time: '',
					class_name: 'my-sticky-class'
				});
			} else {
				$.gritter.add({
					title: 'Information Saved',
					text: 'Your category was added to to the system',
					sticky: false,
					time: '',
					class_name: 'my-sticky-class'
				});
				$('#Category').modal('hide');
				$("#category-name").val("");
				getCategoryList();
			}
		}
	);
}	


function getHashTagList(data)
{

	$("#hashtags-list-table").empty()
	var header = '<tr><th>Tag</th><th></th></tr>';
	$("#hashtags-list-table").append(header);

	$.post('/api/social/social.tag.list.php',{
		},
		function(data) {
			json = $.parseJSON(data);
			
			var html = $.map(json, function (item, i) {
				
				return '<tr><td>' + item.tag + '</td>\
							<td class="text-center col-md-1">\
								<a href="javascript:;" class="btn btn-danger btn-xs" onclick="deleteHashTag(\'' + item.id  + '\');"> <i class="fa fa-times"></i></a>\
							</td>\
						</tr>';
			}).join("");
			
			$("#hashtags-list-table").append(html);
		}
	);	
	
}

function addHashTag() {

	// Type: 1 = customer, 2 = team member, 3 = team leader, 5 = admin
	
	$.post('/api/social/social.tag.create.php',{
			tag: $("#hashtag-name").val()
		},
		function(data) {
			$.gritter.add({
				title: 'Information Saved',
				text: 'Your hashtag was added to to the system',
				sticky: false,
				time: '',
				class_name: 'my-sticky-class'
			});
			$('#HashTag').modal('hide');
			$("#hashtag-name").val("");
			getHashTagList();
		}
	);
}

function deleteHashTag(id) {

	$.post('/api/social/social.tag.delete.php',{
			id: id
		},
		function(data) {
			getHashTagList(data);
		}
	);
}

function listPosts() {

  $.getJSON("/api/social/post.list.php",
  {
    category_id: "recent"   
  },
    function(json) {
    	//console.log(json)
    	postGallery(json)
  }); 
}

function postGallery(json) {
  var template = $("#social-template").html(); 
  var outHtml = "";
  $("#social").empty();      

  $(json).each(function(i,val) {
    var code = template;  
    $.each(val, function(key,val) {
      var reg = new RegExp("%" + key + "%","g");
      code = code.replace(reg, !val ? "" : val);
    });
    $grid.append(code);      
  });
	$grid.isotope({
		itemSelector: '.image'
	});
}

function viewPost(val, action) {
	id = val;
	subject = $('#post-subject-' + id).html();
	post = $('#post-' + id).html();
	category = $("#post-category-" + id).html();
	category_id = $("#post-category_id-" + id).html();

	$('#edit-img').attr("src", $('#post-img-' + id).attr("src"));
	$('#subject').val(subject);
	$('#post').val($.trim(post));
	$("#category-selected").html(category + '  <span class="caret"></span>');
	

	if (action == "post") {
		$('#post-title').html("Post a Message");
		$('#post-edit-actions').hide();
		$('#post-actions').show();

		$('#subject').attr('readonly','');
		$('#post').attr('readonly','');
		$('#post-options').hide();
	} else {
		$('#post-title').html("Edit Post");
		$('#subject').removeAttr('readonly');
		$('#post').removeAttr('readonly');
		$('#post-edit-actions').show();
		$('#post-actions').hide();
		$('#post-options').show();
	}

	$('#modal-post').modal('show');
	countChar();
}

function postLibrary(id) {l
	id = id;
	$('#modal-post').modal('show');

}

function deletePost()
{
	$.post('/api/social/post.delete.php',{
			id: id
		},
		function(data) {
			listPosts();
			$('#modal-post').modal('hide');
		}
	);	
}

function savePost() {
	//console.log("category: " + category_id + ", id: " + id);

	$.post('/api/social/post.edit.php',{
			id: id,
			subject: $('#subject').val(),
			post: $('#post').val(),
			category_id: category_id
		},
		function(data) {
			listPosts();
			$('#modal-post').modal('hide');
		}
	);
}

function getFacebookPages() {

	$('#table-facebook-pages tbody').empty();
	var table = $('#table-facebook-pages tbody');

  $.getJSON("/api/social/facebook.pages.php",
  {
  },
    function(json) {
	    for(var cnt in json) { 
			
	    	var name = json[cnt].name;
	    	var id = json[cnt].id;

			tr = $("<tr></tr>").appendTo(table);
			tr.append( "" +
					   "<td>" + id + "</td>" +
					   "<td>" + name + "</td>" +
					   "<td><a href='javascript:;' class='btn btn-white' data-dismiss='modal' onclick='addFacebookPage(" + id + ")'>Add Page</a></td>");
		}

		$('#modal-facebook-pages').modal('show');  		 

  }); 
}

function addFacebookPage(FacebookPageID) {

	//console.log(FacebookPageID);

	$.getJSON("/api/social/facebook.page.add.php?id=" + FacebookPageID,
	{
	},
	function(json) {
	}); 
}

function importFeatured() {

	$.getJSON("/api/social/post.import.featured.php",
	{
	},
	function(json) {
		listPosts();
	}); 

}

function importRecent() {

	$.getJSON("/api/social/post.import.recent.php",
	{
	},
	function(json) {
		listPosts();
	}); 

}

var Social = function () {
	"use strict";
    return {
        //main function
        init: function () {     
			$('#modal-facebook-pages').modal('hide');  	
        }
    };
}();		



