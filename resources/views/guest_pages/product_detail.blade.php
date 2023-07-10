@extends('layouts.guest')

@section('content')
	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-c flex-w">
							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="{{ asset($product->image) }}">
									<div class="wrap-pic-w pos-relative detail-pic">
										<img src="{{ asset($product->image) }}" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset($product->image) }}">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							{{ $product->name }}
						</h4>

						<span class="mtext-106 cl2">
							{{ $product->price }}
						</span>

						<p class="stext-102 cl3 p-t-23">
							{{ $product->description }}
						</p>
					</div>
				</div>
			</div>

			
		</div>

	</section>
	
@endsection
