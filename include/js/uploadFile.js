function uploadProgressCommon(evt) {
    if (evt.lengthComputable) {
        var percentComplete = Math.round(evt.loaded * 100 / evt.total);

        document.getElementById('progress').style.width = '' + percentComplete + '%';
        document.getElementById('progress').innerHTML = percentComplete.toString() + '%';
    }
    else {
        document.getElementById('progress').innerHTML = 'unable to compute';
    }
}

function downloadFileCommon(fileName, filePath)
{
    var link = document.createElement('a');
    link.href = filePath;
    link.download = fileName;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

function uploadFileCommon(pathUrl) {
    // <<<< billy_ADD_20171128
    var myBackup = $('#uploadConfirmModal').clone();

    $('#uploadConfirmModal').remove();
    $('.modal-backdrop').remove();
    var myClone = myBackup.clone();
    myClone.hide();
    $('body').append(myClone);
    $(document.body).css({
        "overflow-x":"auto",
        "overflow-y":"auto"
    });
    // >>>>

    var folderPath = document.getElementById('uploadFilePath').value;

    if ($('#patientId').val() > 0)
        folderPath += $('#patientId').val();
    else
        folderPath += "new";

    folderPath += "/" + document.getElementById('processingTableName').value;

    isDuplicateFile(pathUrl, folderPath);
}

function  isDuplicateFile(pathUrl, folderPath) {
    var postdata = {};

    postdata['fileName'] = document.getElementById('uploadFileName').value;

    if (document.getElementById('tableId') != null)
        postdata['tableId'] = document.getElementById('tableId').value;
    else
        postdata['tableId'] = document.getElementById('tableId').value;

    postdata['permissionId'] = document.getElementById('permissionId').value;

    var url = '/approval/isDuplicateFile';

    sendAjax(url, postdata, function (data) {
        if (data != null) {
            if (data === 1)
                uploadFiles(pathUrl, folderPath);
            else if (data === 2) {
                showAlertDialog(g_sameFileNameExist);

                // <<<< billy_ADD_20171126
                $('#fileToUpload').val('');
                $('#photoToUpload').val('');
                // >>>>
            }
            else if (data === 0) {
                showAlertDialog(g_processingErrorMsg);

                $('#fileToUpload').val('');
                $('#photoToUpload').val('');
            }
        }
    }, 'json');
}

function uploadFiles(pathUrl, folderPath) {
    if (document.getElementById('uploadFileName').value == '')
    {
        showAlertDialog(g_emptyUploadFileName, function () {
            $('#uploadConfirmModal').modal();
            addScrollForWindows();
        });
    }
    else
    {
        // <<<< billy_DEL_20171126
        // var filePath = document.getElementById('uploadFilePath').value + document.getElementById('uploadFileName').value;

        // if (doesFileExist(filePath))
        // {
        //     showAlertDialog(g_sameFileNameExist);
        //     // document.getElementById('dlgError').innerHTML = g_sameFileNameExist;
        //     return;
        // }
        // >>>>

        $('#progressDiv').attr('hidden', false);
        if ($('#form').height() > window.innerHeight)
        {
            $('#commonBackObj').css('height', $('#form').css('height'));
        }

        $('#commonBackObj').attr('hidden', false);

        var postData = new FormData();
        postData.append("uploadFile", document.getElementById($('#currentSelected').val()).files[0]);
        postData.append("fileName", document.getElementById('uploadFileName').value);
        if (document.getElementById('patientId') != null)
            postData.append("patientId", document.getElementById('patientId').value);

        if (document.getElementById('processingTableId') != null)
            postData.append("processingTableId", document.getElementById('processingTableId').value);
        else
            postData.append("processingTableId", -1);

        // <<<< billy_ADD_20171126
        postData.append("folderPath", folderPath);
        // >>>>

        sendAjaxWithFile(pathUrl, postData, function (data) {
            if (data != null) {
                $('#progressDiv').attr('hidden', true);

                $('#fileToUpload').val('');
                $('#photoToUpload').val('');

                if (data == 0)
                {
                    $('#commonBackObj').attr('hidden', true);
                    document.getElementById('dlgError').innerHTML = g_sameFileNameExist;
                    showAlertDialog(g_sameFileNameExist);
                }
                if (data == 2)
                {
                    // document.getElementById('dlgError').innerHTML = g_uploadFailed;
                    showAlertDialog(g_uploadFailed);
                }
                if (data == 1)
                {
                    $('#uploadConfirmModal').modal('hide');
                    addScrollForWindows();
                    $('#commonBackObj').attr('hidden', true);
                    document.getElementById($('#currentSelected').val()).value = '';

                    updateUploadedFileList($('#reloadPath').val());

                    showAlertDialog(g_fileUploadSuccess);
                }
            }
        });
    }
}

function updateUploadedFileList(reloadUrl)
{
    var postdata = {};

    if (document.getElementById('patientId') != null) {
        postdata['patientId'] = document.getElementById('patientId').value;
    }

    if (document.getElementById('processingTableId') != null)
    {
        postdata['processingTableId'] = document.getElementById('processingTableId').value;
    }

    if (document.getElementById('bloodCollectId') != null) {
        postdata['bloodCollectId'] = document.getElementById('bloodCollectId').value;
    }

    if (document.getElementById('infusionId') != null) {
        postdata['infusionId'] = document.getElementById('infusionId').value;
    }

    if (document.getElementById('SBCId') != null) {
        postdata['SBCId'] = document.getElementById('SBCId').value;
    }

    if (document.getElementById('ISBCId') != null) {
        postdata['ISBCId'] = document.getElementById('ISBCId').value;
    }

    if (document.getElementById('bloodCollectionReceiveId') != null) {
        postdata['bloodCollectionReceiveId'] = document.getElementById('bloodCollectionReceiveId').value;
    }

    if (document.getElementById('approvalId') != null)
    {
        postdata['approvalId'] = document.getElementById('approvalId').value;
    }

    sendAjax(reloadUrl, postdata, function (data) {
        if (data != null) {
            var panel = document.getElementById('uploadedFiles');
            if(panel)
                panel.innerHTML = data;
            document.getElementById('uploadFileTitle').innerHTML = document.getElementById('uploadPartTitle').value;

            updateFileNameTextWidth();
        }
    });
}

function deleteUploadFileCommon(realFilePath, filePath) {
    var postdata = {};

    postdata['filePath'] = filePath;
    // <<<< billy_ADD_20171127
    postdata['realFilePath'] = realFilePath;
    // >>>>
    var url = '/entrance/deleteUploadFileInfoCommon';

    sendAjax(url, postdata, function (data) {
        if (data != null) {
            if (data == 0)
                showAlertDialog(g_deleteFailedMsg);
            if (data == 1) {
                updateUploadedFileList($('#reloadPath').val());
                showAlertDialog(g_deleteSuccessMsg);
            }
            if (data == 2)
                showAlertDialog(g_deleteFailedMsg);

        }
    }, 'json');
}

function submitAdditionFiles(url) {
    var postdata = {};

    postdata['patientId'] = document.getElementById('patientId').value;
    if (document.getElementById('bloodCollectionId'))
        postdata['bloodCollectionId'] = document.getElementById('bloodCollectionId').value;
    if (document.getElementById('infusionsId'))
        postdata['infusionId'] = document.getElementById('infusionsId').value;
    if (document.getElementById('SBC_Id'))
        postdata['SBCId'] = document.getElementById('SBC_Id').value;
    if (document.getElementById('ISBC_Id'))
        postdata['ISBCId'] = document.getElementById('ISBC_Id').value;

    sendAjax(url, postdata, function (data) {
        if (data != null) {
            if (data == 0)
                showAlertDialog(g_processingErrorMsg);
            if (data == 1) {
                showAlertDialog(g_submitSuccessMsg, function () {
                    goToPage(document.getElementById('refreshPath').value);
                });
                return false;
            }
            if (data == 2)
                showAlertDialog(g_additionFilesError);
        }
    }, 'json');
}

// <<<< billy_ADD_20171125
function updateFileNameTextWidth() {
    $('#fileNameText input').width($('#fileNameText').width() - $('#buttonGroup').width() - g_spaceWidthLength);
}
function updateViewFileNameTextWidth() {
    $('#fileViewNameText input').width($('#fileViewNameText').width() - $('#buttonViewGroup').width() - g_spaceWidthLength);
}

function clearUploadFiles() {
    // <<<< billy_ADD_20171128
    var myBackup = $('#uploadConfirmModal').clone();

    $('#uploadConfirmModal').remove();
    $('.modal-backdrop').remove();
    var myClone = myBackup.clone();
    myClone.hide();
    $('body').append(myClone);
    $(document.body).css({
        "overflow-x":"auto",
        "overflow-y":"auto"
    });
    // >>>>

    // <<<< billy_ADD_20171128 : for upload files
    if (document.getElementById('fileToUpload') != null)
        $('#fileToUpload').val('');
    if (document.getElementById('photoToUpload') != null)
        $('#photoToUpload').val('');
    // >>>>
}
// >>>>

