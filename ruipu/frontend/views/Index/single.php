
<!-- start banner -->
<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>

<div class="single">
<div class="container">
<div class="content span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="images/1.jpg" class="img-responsive" alt=""/>
					</div>
		<div class="desc span_3_of_2">
					<h3>Lorem Ipsum is simply dummy</h3>
			<div class="desc">
                <span class="brand">Brand: <a href="#">Sed do eiusmod </a></span><br>
                <span class="code">Product Code: Product 11</span><br>
                <div class="padd-stock"> <div class="extra-wrap"> <span class="prod-stock-2">Availability:</span> <div class="prod-stock">In Stock</div></div></div>
            <div class="price">
        		<span class="text">Price:</span>
                <span class="price-new">$110.00</span><span class="price-old">$100.00</span> 
                        <span class="price-tax">Ex Tax: $90.00</span><br>
                        <span class="points"><small>Price in reward points: 400</small></span><br>
                      </div>
                  <div class="single-cart">
			        <div class="prod-row">
			          <div class="cart-top">
			            <div class="cart-top-padd">
			                <label>Qty:</label>
			                <input type="text" name="quantity" size="2" value="1">
			                <input type="hidden" name="product_id" size="2" value="47">
			
			              </div>
						  <form action="checkout.html">
							<input type="submit" value="Add to Cart" class="button6">
						  </form>
			          </div>
        			</div>
        		</div>
          </div>
	</div>
				<div class="clearfix"> </div>
		<div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab"><span>Description</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Information</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Reviews</span></li>
							  <div class="clear"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							    <h2 class="resp-accordion" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span> Description</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
									<div class="facts">
									  <ul class="tab_list">
									  	<li><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</a></li>
									  	<li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
									  	<li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica</a></li>
									  	<li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
									  </ul>           
							        </div>
							     </div>	
							      <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>Information</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
									<div class="facts">
									  <ul class="tab_list">
									    <li><a href="#">augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigatione</a></li>
									  	<li><a href="#">claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica</a></li>
									  	<li><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</a></li>
									  </ul>           
							        </div>
							     </div>	
							      <h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>Reviews</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
							 <ul class="tab_list">
							<li data-content="television" class="selected">
								<div class="comments-top-top">
									<div class="top-comment-left">
										<img class="img-responsive" src="images/co.png" alt="">
									</div>
									<div class="top-comment-right">
										<h6><a href="#">Hendri</a> - September 3, 2014</h6>
										<ul class="star-footer">
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
										</ul>
										<p>Wow nice!</p>
									</div>
										<div class="clearfix"> </div>
									<a class="add-re" href="#">ADD REVIEW</a>
								</div>
							</li>
									  </ul>      
							     </div>	
							</div>
					      </div>
					 </div>
				</div>	
					<div class="clearfix"> </div><div class="row shop_box-top">
				<div class="col-md-3 shop_box"><a href="single.html">
					<img src="images/11.jpg" class="img-responsive" alt="">
					</a>
						<div class="special-info grid_1 simpleCart_shelfItem">
							<h5>Consectetur adipis</h5>
							<div class="item_add"><span class="item_price">
								<span class="actual">$12.00</span></span></div>
							<div class="item_add"><span class="item_price"><a href="#">Add to cart</a></span></div>
						</div>
				</div>
				<div class="col-md-3 shop_box"><a href="single.html">
					<img src="images/2.jpg" class="img-responsive" alt="">
					</a>
						<div class="special-info grid_1 simpleCart_shelfItem">
							<h5>Consectetur adipis</h5>
							<div class="item_add"><span class="item_price">
								<span class="actual">$12.00</span></span></div>
							<div class="item_add"><span class="item_price"><a href="#">Add to cart</a></span></div>
						</div>
				</div>
				<div class="col-md-3 shop_box"><a href="single.html">
					<img src="images/3.jpg" class="img-responsive" alt="">
					</a>
						<div class="special-info grid_1 simpleCart_shelfItem">
							<h5>Consectetur adipis</h5>
							<div class="item_add"><span class="item_price">
								<span class="actual">$12.00</span></span></div>
							<div class="item_add"><span class="item_price"><a href="#">Add to cart</a></span></div>
						</div>
				</div>
				<div class="col-md-3 shop_box"><a href="single.html">
					<img src="images/5.jpg" class="img-responsive" alt="">
					</a>
						<div class="special-info grid_1 simpleCart_shelfItem">
							<h5>Consectetur adipis</h5>
							<div class="item_add"><span class="item_price">
								<span class="actual">$12.00</span></span></div>
							<div class="item_add"><span class="item_price"><a href="#">Add to cart</a></span></div>
						</div>
				</div>
			</div>
				
</div>
</div>	


