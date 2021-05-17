/*
 * FileName  : ajax.js
 * Function  : Implement the Ajax proc
 * Creator   : SCH
 * Date      : 2017
 */

/*
 * FuncName  : ajaxSetup
 * Function  : It's Ajax process's initialize set up
 * Parameter : url = naviation's url
 * Creator   : Clark
 */
function ajaxSetup(){
    $.ajaxSetup({
        xhr: function()
        {
            try
            {
                if(window.ActiveXObject)
                {
                    return new window.ActiveXObject("Microsoft.XMLHTTP");
                }
                else
                {
                    return new window.XMLHttpRequest();
                }
            }
            catch(e) { }
        }
    });
}

/*
 * FuncName  : sendAjax
 * Function  : ajax proc common function
 * Parameter : types : text or json
 * Return    :
 * Creator   : Clark
 * Date      : 2017
 */
function sendAjax(pathurl, postdata, callback, types, async)
{
    if(!types)
        types = "text";

    if (!async)
        async = false;

    $.ajax({
        type:"post",
        contentType:"application/x-www-form-urlencoded; charset=utf-8",
        url:pathurl,
        data:postdata,
        dataType : types,
        async: async,
        converters: {
            'text json': function(result) { // console.log(result);
                try {
                    // First try to use native browser parsing
                    if (typeof JSON === 'object' && typeof JSON.parse === 'function') {
                        return JSON.parse(result);
                    } else {
                        // Fallback to jQuery's parser
                        return $.parseJSON(result);
                    }
                } catch (e) {
                    // Whatever you want as your alternative behavior, goes here.
                    // In this example, we send a warning to the console and return
                    // an empty JS object.

                    // console.log(e);
                    console.log("Warning: Could not parse expected JSON response.");
                    return {};
                }
            }
        },
        success: function(data)
        {
            if (data !== null)
            {
                if(callback)
                    callback(data);
            }
            else
            {
                alert(g_networkError);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(g_networkError);
        }
    });
}

// <<<< billy_ADD_20170821
function sendAjaxWithFile(pathurl, postdata, callback)
{
    $.ajax({
        type:"post",
        url:pathurl,
        data:postdata,
        processData: false,
        contentType:false,
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            if(myXhr.upload){
                if ($('#progress-bar').length && $('#progress-bar').length > 0)
                    myXhr.upload.addEventListener('progress',progress, false);
            }
            return myXhr;
        },
        success: function(data)
        {
            if (data !== null)
            {
                if(callback)
                    callback(data);
            }
            else
            {
                alert(g_networkError);
            }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert(g_networkError);
        }
    });
}
// >>>>