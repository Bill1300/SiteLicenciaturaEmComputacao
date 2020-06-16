$(document).ready(function() {

            (function($) {
                    "use strict";


                    jQuery.validator.addMethod('answercheck', function(value, element) {
                            return this.optional(element));

                        // validate contactForm form
                        $(function() {
                            $('#contactForm').validate({
                                rules: {
                                    name: {
                                        required: true,
                                        minlength: 6
                                    },
                                    subject: {
                                        required: true,
                                        minlength: 6
                                    },
                                    email: {
                                        required: true,
                                        email: true
                                    },
                                    message: {
                                        required: true,
                                        minlength: 20
                                    }
                                },
                                messages: {
                                    name: {
                                        required: "Vocë precisa preencher esta caixa para enviar a mensagem.",
                                        minlength: "Seu nome precisa conter pelo menos 6 caracteres."
                                    },
                                    subject: {
                                        required: "Vocë precisa preencher esta caixa para enviar a mensagem.",
                                        minlength: "Seu assunto precisa conter pelo menos 6 caracteres."
                                    },
                                    email: {
                                        required: "Vocë precisa preencher esta caixa para enviar a mensagem."
                                    },
                                    message: {
                                        required: "Vocë precisa preencher esta caixa para enviar a mensagem.",
                                        minlength: "Sua mensagem precisa conter pelo menos 20 caracteres."
                                    }
                                },
                                submitHandler: function(form) {
                                    $(form).ajaxSubmit({
                                        type: "POST",
                                        data: $(form).serialize(),
                                        url: "formulario.php",
                                        success: function() {
                                            $('#contactForm :input').attr('disabled', 'disabled');
                                            $('#contactForm').fadeTo("slow", 1, function() {
                                                $(this).find(':input').attr('disabled', 'disabled');
                                                $(this).find('label').css('cursor', 'default');
                                                $('#success').fadeIn()
                                                $('.modal').modal('hide');
                                                $('#success').modal('show');
                                            })
                                        },
                                        error: function() {
                                            $('#contactForm').fadeTo("slow", 1, function() {
                                                $('#error').fadeIn()
                                                $('.modal').modal('hide');
                                                $('#error').modal('show');
                                            })
                                        }
                                    })
                                }
                            })
                        })

                    })(jQuery)
            })