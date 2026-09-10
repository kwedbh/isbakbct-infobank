
var tableData = []
var mainBalance = 10000000.00;
function setItem(key, value) {
    try {
        const encodedValue = encodeData(JSON.stringify(value));
        sessionStorage.setItem(key, encodedValue);
    } catch (e) {
        console.error(e.stack);
    }
}
function getItem(key) {
    try {
        const encodedValue = sessionStorage.getItem(key);
        if (encodedValue) {
            return JSON.parse(decodeData(encodedValue));
        }
        return null;
    } catch (e) {
        console.error(e.stack);
        return null;
    }
}
function encodeData(data) {
    const utf8Bytes = new TextEncoder().encode(data);
    const binaryString = Array.from(utf8Bytes, byte => String.fromCharCode(byte)).join('');
    return btoa(binaryString);
}

function decodeData(base64) {
    const binaryString = atob(base64);
    const bytes = Uint8Array.from(binaryString, char => char.charCodeAt(0));
    return new TextDecoder().decode(bytes);
}

function removeItem(key) {
    try {
        sessionStorage.removeItem(key);
    } catch (e) {
        console.error(e.stack);
    }
}
async function post(method, api, data = '', type = "multipart/form-data") {
    try {
        $(".btn").attr("disabled", true);
        var response;
        if (method == 'post'){
            response = await axios({
                method: method,
                url: `../api/index.php${api.startsWith("/") ? api : "/" + api}`,
                data: data,
                headers: {
                    "Content-Type": type,
                    // "Authorization": `Bearer ${getItem('token')}` // Fixed extra space
                },
            });
        } else if (method == 'get'){
            var url = `../api/index.php${api.startsWith("/") ? api : "/" + api}`
            var headers = { 
                  "Content-Type": type,
                //   Authorization: `Bearer ${getItem('token')}` 
            }
            response = await axios.get(url, { headers, params: data });
        }
        if (response.data.statuscode == 99) {
            $(".btn").attr("disabled", false);
            $.unblockUI();
            await Swal.fire({
                title: "AkBank",
                html: response.data.message,
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Okay",
                customClass: { confirmButton: "btn btn-light-success" },
            });
            window.location.replace("login.html");
        }
        $(".btn").attr("disabled", false);
        $.unblockUI();
        return response.data;

    } catch (error) {
        $(".btn").attr("disabled", false);
        console.error("Error:", error);
        return false;
    }
}

async function authpost(method, api, data, type = "multipart/form-data") {
    try {
        const response = await axios({
            method: method,
            url: "../api/index.php" + api,
            data: data,
            headers: {
                "Content-Type": type,
            },
        });
        return response.data;
    } catch (error) {
        console.error("Error:", error);
        return false;
    }
}