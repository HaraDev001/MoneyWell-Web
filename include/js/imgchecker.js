function checkImage(obj, width, height)
{
    var path = "";
    if (obj.files && obj.files[0])
        path = window.URL.createObjectURL(obj.files[0]);

    if (obj.value)
    {
        if (!/.(jpg|jpeg|png|JPG|PNG|bmp|BMP)$/.test(obj.value))
        {
            showAlertDialog(g_imgTypeWrong);
            obj.value = "";
            return obj.value;
        }
    }

    var image = new Image();
    image.src = path;
    image.onload = function()
    {
        if (width > 0 && height > 0)
        {
            if (image.width != width || image.height != height)
            {
                showAlertDialog(g_imgSizeWrong, function () {
                    if (document.getElementById('deleteImg'))
                        $('#deleteImg').click();
                });
                obj.value = "";
            }
        }
    };

    return obj.value;
}