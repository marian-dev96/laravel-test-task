function copyText() {
    let copyText = document.getElementById("copy");

    copyText.select();
    copyText.setSelectionRange(0, 99999);

    document.execCommand("copy");

    alert("Referral link successfully copied");
}
