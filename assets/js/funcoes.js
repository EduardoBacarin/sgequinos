$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

function sucesso(msg){
    toastr.success(msg)
}

function info(msg){
    toastr.info(msg)
}

function erro(msg){
    toastr.error(msg)
}

function aviso(msg){
    toastr.warning(msg)
}