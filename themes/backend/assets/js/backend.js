function AddLink() {
    var linkForm = $('#matchmodel-external_link').val();
    var linkAdd = $('#link_add').val();
    $.post("/backend/main/addjson", {external_link: linkForm, linkAdd: linkAdd}, function(data) {
        if (data == "F1") {
            alert('ข้อมูลไม่ถูกต้อง');
        } else if (data == "F2") {
            $('#link_add').val("");
        } else {
            $('#matchmodel-external_link').val(data);
            $('#link_add').val("");
        }
    });
}

// for manage external link
function GetOtherLinkArray() {
    var allLinksValue = $('#other_links').val();
    var linkArray = [];
    
    if (allLinksValue) {
        linkArray = $.parseJSON(allLinksValue);
    }
    
    return linkArray;
}

function AddOtherLink() {
    var inputValue = $('#other_links-input').val().trim();
    
    if(!inputValue) {
        return false;
    }
   
    var linkArray = GetOtherLinkArray();
   
    linkArray.push(inputValue);    
    
    if(linkArray.length) {
        $('#other_links').val(JSON.stringify(linkArray));
    }
    else {
        $('#other_links').val('');
    }
    
    $('#other_links-input').val('');
    
    ListOtherLink();
}

function RemoveOtherLink(link) {
    
    var linkArray = GetOtherLinkArray();
    
    var index = linkArray.indexOf(link);
    
    if (index > -1) {
        linkArray.splice(index, 1);
    }
    
    if(linkArray.length) {
        $('#other_links').val(JSON.stringify(linkArray));
    }
    else {
        $('#other_links').val('');
    }
    
    ListOtherLink();
}

function ListOtherLink() {
    
    // get value from input
    var allLinksValue = $('#other_links').val();
    var linkArray = [];
    
    if (allLinksValue) {
        linkArray = $.parseJSON(allLinksValue);
    }
    
    // clear and display all values
    $('#other_links-list').html('');
    for (var i = 0; i < linkArray.length; i++) {
        $('#other_links-list').append('<li>'+linkArray[i]+'&nbsp;<span class="glyphicon glyphicon-remove" style="cursor:pointer" onclick="RemoveOtherLink(\''+linkArray[i]+'\')"></span></li>');
    }
    
}

// for manage youtube link
function GetYoutubeArray() {
    var allYoutubeLinksValue = $('#youtube_other_links').val();
    var youtubeArray = [];
    
    if (allYoutubeLinksValue) {
        youtubeArray = $.parseJSON(allYoutubeLinksValue);
    }
    
    return youtubeArray;
}

function AddYoutubeOtherLink() {
    var inputValue = $('#youtube_other_links-input').val().trim();
    
    if(!inputValue) {
        return false;
    }
   
    var youtubeArray = GetYoutubeArray();
   
    youtubeArray.push(inputValue);    
    
    if(youtubeArray.length) {
        $('#youtube_other_links').val(JSON.stringify(youtubeArray));
    }
    else {
        $('#youtube_other_links').val('');
    }
    
    $('#youtube_other_links-input').val('');
    
    ListYoutubeOtherLink();
}

function RemoveYoutubeOtherLink(youtubelink) {
    
    var youtubeArray = GetYoutubeArray();
    
    var index = youtubeArray.indexOf(youtubelink);
    
    if (index > -1) {
        youtubeArray.splice(index, 1);
    }
    
    if(youtubeArray.length) {
        $('#youtube_other_links').val(JSON.stringify(youtubeArray));
    }
    else {
        $('#youtube_other_links').val('');
    }
    
    ListYoutubeOtherLink();
}

function ListYoutubeOtherLink() {
    
    // get value from input
    var allYoutubeLinksValue = $('#youtube_other_links').val();
    var youtubeArray = [];
    
    if (allYoutubeLinksValue) {
        youtubeArray = $.parseJSON(allYoutubeLinksValue);
    }
    
    // clear and display all values
    $('#youtube_other_links-list').html('');
    for (var i = 0; i < youtubeArray.length; i++) {
        $('#youtube_other_links-list').append('<li>'+youtubeArray[i]+'&nbsp;<span class="glyphicon glyphicon-remove" style="cursor:pointer" onclick="RemoveYoutubeOtherLink(\''+youtubeArray[i]+'\')"></span></li>');
    }
    
}

$( document ).ready(function() {
    ListYoutubeOtherLink();
    ListOtherLink();
});