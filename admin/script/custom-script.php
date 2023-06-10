<?php //echo ''; ?>
    <script type="text/javascript">  

         
        $(document).ready(function() {
            $('#addArticle_form').submit(function(e){ 
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'admin/script/add-article.php',
                    data: $(this).serialize(),
                    success: function(data){ 
                        if(data > 0){  
                            $('#messagebox')
                                .html('<div class="alert alert-success rounded-0" role="alert"><i class="fas fa-check-circle"></i> - عملية حفظ المعلومات تمت بنجاح </div>')
                                .fadeIn(1000)
                                .removeClass('d-none');
                                setTimeout(function(){ $('#messagebox').fadeOut(500); }, 2500);
                                //setTimeout(function(){ window.location = 'add-article.php?id=' + data; }, 3000);
                        }else if(data == 0){  
                            $('#messagebox')
                                .html('<div class="alert alert-warning rounded-0" role="alert"><i class="fas fa-exclamation-triangle"></i> - لم تتم عملية حفظ المعلومات بنجاح  </div>')
                                .fadeIn(1000)
                                .removeClass('d-none');
                                setTimeout(function(){ $('#messagebox').fadeOut(500); }, 2500);
                        }else{ 
                            $('#messagebox')
                                .html('<div class="alert alert-danger rounded-0" role="alert"><i class="fas fa-exclamation-triangle"></i> - لم تتم عملية حفظ المعلومات بنجاح  </div>')
                                .fadeIn(1000)
                                .removeClass('d-none');
                                setTimeout(function(){ $('#messagebox').fadeOut(500); }, 2500);
                        }
                    }
                });
                document.getElementById('title_ar').value = '';
                document.getElementById('content_ar').value = '';
                document.getElementById('content_ar').focus();
                window.location='#link-article';
                //document.getElementById('title_ar').focus();
            });
        });  

         
        $(document).ready(function() {
            $('#addProSol_form').submit(function(e){ 
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'admin/script/add-ProSol.php',
                    data: $(this).serialize(),
                    success: function(data){ 
                        if(data > 0){  
                            $('#messagebox')
                                .html('<div class="alert alert-success rounded-0" role="alert"><i class="fas fa-check-circle"></i> - عملية حفظ المعلومات تمت بنجاح </div>')
                                .fadeIn(1000)
                                .removeClass('d-none');
                                setTimeout(function(){ $('#messagebox').fadeOut(500); }, 2500);
                                //setTimeout(function(){ window.location = 'add-article.php?id=' + data; }, 3000);
                        }else if(data == 0){  
                            $('#messagebox')
                                .html('<div class="alert alert-warning rounded-0" role="alert"><i class="fas fa-exclamation-triangle"></i> - لم تتم عملية حفظ المعلومات بنجاح  </div>')
                                .fadeIn(1000)
                                .removeClass('d-none');
                                setTimeout(function(){ $('#messagebox').fadeOut(500); }, 2500);
                        }else{ 
                            $('#messagebox')
                                .html('<div class="alert alert-danger rounded-0" role="alert"><i class="fas fa-exclamation-triangle"></i> - لم تتم عملية حفظ المعلومات بنجاح  </div>')
                                .fadeIn(1000)
                                .removeClass('d-none');
                                setTimeout(function(){ $('#messagebox').fadeOut(500); }, 2500);
                        }
                    }
                });
                document.getElementById('probleme_ar').value = '';
                document.getElementById('solution_ar').value = '';
                document.getElementById('sous_axe').selectedIndex = 0;
                window.location='#link-axe';
                //document.getElementById('sous_axe').focus();
            });
        });   

         
        $(document).ready(function() {
            $('#addSuggestion_form').submit(function(e){ 
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'admin/script/add-suggestion.php',
                    data: $(this).serialize(),
                    success: function(data){ 
                        if(data > 0){  
                            $('#messagebox')
                                .html('<div class="alert alert-success rounded-0" role="alert"><i class="fas fa-check-circle"></i> - عملية حفظ المعلومات تمت بنجاح </div>'+data)
                                .fadeIn(1000)
                                .removeClass('d-none');
                                setTimeout(function(){ $('#messagebox').fadeOut(500); }, 2500);
                                //setTimeout(function(){ window.location = 'add-article.php?id=' + data; }, 3000);
                        }else if(data == 0){  
                            $('#messagebox')
                                .html('<div class="alert alert-warning rounded-0" role="alert"><i class="fas fa-exclamation-triangle"></i> - لم تتم عملية حفظ المعلومات بنجاح  </div>'+data)
                                .fadeIn(1000)
                                .removeClass('d-none');
                                //setTimeout(function(){ $('#messagebox').fadeOut(500); }, 2500);
                        }else{ 
                            $('#messagebox')
                                .html('<div class="alert alert-danger rounded-0" role="alert"><i class="fas fa-exclamation-triangle"></i> - لم تتم عملية حفظ المعلومات بنجاح  </div>'+data)
                                .fadeIn(1000)
                                .removeClass('d-none');
                                //setTimeout(function(){ $('#messagebox').fadeOut(500); }, 2500);
                        }
                    }
                });
               /* document.getElementById('probleme_ar').value = '';
                document.getElementById('solution_ar').value = '';
                document.getElementById('sous_axe').selectedIndex = 0;
                window.location='#link-axe';*/
                //document.getElementById('sous_axe').focus();
            });
        });  
        
    </script>