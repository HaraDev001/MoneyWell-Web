function pageMove(url)
{
    var formObj = document.getElementById("form");

    formObj.action = url;
    formObj.submit();
}

function isIncludeSpaceCharacter(objName, msg)
{
    var regexp = /[ ]/i;
    var obj = document.getElementById(objName);

    if(regexp.test( obj.value))
    {
        document.getElementById('error_div').className = "alert alert-danger display-hide";
        document.getElementById('error').innerHTML = msg;
        document.getElementById(objName).focus();
        // showAlertDialog(msg, function () {
        //     document.getElementById(objName).focus();
        // });

        return true;
    }
    else
    {
        return false;
    }
}

function isEmptyErrorNotice(objName, msg)
{
    if(!objName)
        return false;

    var obj = document.getElementById(objName);

    if(!obj || obj.value == "")
    {
        document.getElementById('error_div').className = "alert alert-danger";
        document.getElementById('error').innerHTML = msg;
        document.getElementById(objName).focus();

        return true;
    }
    else
    {
        return false;
    }
}

function showWarningMessage(inputName)
{
    $('#' + inputName + 'Warning').attr('hidden', false);
}

function hideWarningMessage(inputName)
{
    $('#' + inputName + 'Warning').attr('hidden', true);
}

function showEmptyNotice(objectIds) {
    if (!objectIds)
        return false;

    var flag = 0;
    var content;

    for (var i = objectIds.length - 1; i >= 0; i--)
    {
        if (objectIds[i] == 'editor')
            content = CKEDITOR.instances.editor.getData();
        else
            content = document.getElementById(objectIds[i]).value;

        if (content == '' || content == '-1')
        {
            showWarningMessage(objectIds[i]);

            if (objectIds[i] != 'startdate' && objectIds[i] != 'enddate')
                document.getElementById(objectIds[i]).focus();

            flag = 1;
        }
    }

    if (flag == 1)
        return true;
    else
        return false;
}

function showAlertDialog(content, callback, title)
{
    if (title == null)
        title = "提示";

    $('#alertModal').modal('show');

    document.getElementById('alertText').innerHTML = content;
    document.getElementById('alertTitle').innerHTML = title;

    $("#alertConfirmButton").click(function () {
        $('#alertModal').modal('hide');

        if (callback)
            callback();
    });
}

function showConfirmDialog(content, callback, title)
{
    if (title == null)
        title = "提示";

    $('#confirmModal').modal('show');

    document.getElementById('confirmText').innerHTML = content;
    document.getElementById('confirmTitle').innerHTML = title;

    $("#confirmButton").click(function () {
        $('#confirmModal').modal('hide');

        if (callback)
            callback();
    });
}

function createNewPage(filePath) {
    window.open(filePath, '_blank');
    window.focus();
}