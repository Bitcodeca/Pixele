<?php get_header(); ?>
<section class="margin">
    <div class="container">
    	<div class="row">

			<h2 class="text-center">Contacto</h2>
			<div class="col-md-6 col-sm-6 col-xs-12">
                <form>
                	<div class="col-md-12">
                        <span class="input input--nao">
                            <input class="input__field input__field--nao" type="text" id="input-1" />
                            <label class="input__label input__label--nao" for="input-1">
                                <span class="input__label-content input__label-content--nao">Nombre*</span>
                            </label>
                            <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
                            </svg>
                        </span>
                    </div>
                    <div class="col-md-12">
                        <span class="input input--nao">
                            <input class="input__field input__field--nao" type="email" id="input-3" />
                            <label class="input__label input__label--nao" for="input-3">
                                <span class="input__label-content input__label-content--nao">Email*</span>
                            </label>
                            <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
                            </svg>
                        </span>
                    </div>
                    <div class="col-md-12">
                        <span class="input input--nao">
                            <input class="input__field input__field--nao" type="number" id="input-3" />
                            <label class="input__label input__label--nao" for="input-3">
                                <span class="input__label-content input__label-content--nao">Número Telefónico*</span>
                            </label>
                            <svg class="graphic graphic--nao" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
                                <path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
                            </svg>
                        </span>
                    </div>
        
                    <div class="col-md-12">
                        <span class="mensage input input--nao">
                        <label class="input__label" for="message"> <span class="text-left">Mensaje*</span> </label>
                            <textarea class="pruebainput" type="text" id="message" required rows="10" style="resize: none;"></textarea>
                            
                        </span>
                    </div>
                    <div class="col-md-12">
                    	<center><button class="btn btn-default"><i class="glyphicon glyphicon-send"> </i> Enviar</button></center>
                    </div>
                </form>
            </div>
            <div class="col-md-offset-1 col-md-5 col-sm-6 col-xs-12">
            	<div class="col-md-12">
                		<a href="#"><p><img src="<?php echo get_bloginfo('template_directory');?>/img/loac1.png"> Barquisimeto, Edo. Lara</p></a>
                		<a href="#"><p><img src="<?php echo get_bloginfo('template_directory');?>/img/whatsapp1.png"> +58-4245996239</p></a>
                		<a href="#"><p><img src="<?php echo get_bloginfo('template_directory');?>/img/mail1.png"> contacto@pixele.com.ve</p></a>
                		<a href="#"><p><img src="<?php echo get_bloginfo('template_directory');?>/img/fb1.png"> Pixele art and fun</p></a>
                        <a href="#"><p><img src="<?php echo get_bloginfo('template_directory');?>/img/inst1.png"> @pixele</p></a>
                        <a href="#"><p><img src="<?php echo get_bloginfo('template_directory');?>/img/twit1.png"> @pixele</p></a>
                        <a href="#"><p><img src="<?php echo get_bloginfo('template_directory');?>/img/youtube1.png"> Pixele art and fun</p></a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>		
<?php get_footer(); ?>