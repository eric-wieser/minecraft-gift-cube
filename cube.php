<?php
	header("Content-type: image/svg+xml");
	echo '<?xml version="1.0" standalone="yes"?>';

	$themes = array(
		'grass' => array(
			'top' => 'grass-top',
			'side' => 'grass-side',
			'end' => 'grass-side',
			'bottom' => 'dirt'
		),
		'snow' => array(
			'top' => 'snow-top',
			'side' => 'snow-side',
			'end' => 'snow-side',
			'bottom' => 'dirt'
		),
		'workbench' => array(
			'top' => 'workbench-top',
			'side' => 'workbench-side',
			'end' => 'workbench-end',
			'bottom' => 'plank'
		)
	);
	
	$code = @$_GET['code'] or $code = 'c0d3-g0e5-h3r3';//'code-goes-here';
	$line1 = @$_GET['line1'] or $line1 = 'Happy';
	$line2 = @$_GET['line2'] or $line2 = 'Birthday!';
	$themeName = @$_GET['theme'] or $themeName = 'grass';
	$theme = $themes[$themeName];

	$clean = @$_GET['clean'] or $clean = false
?>
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" 
"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">

<svg width="12cm" height="21cm" version="1.1"
	viewBox="0 0 48 84"
	xmlns="http://www.w3.org/2000/svg"
	xmlns:xlink="http://www.w3.org/1999/xlink">
	<defs>
		<style type="text/css">
			<![CDATA[
				@font-face {
					font-family:"Minecraft";
					src:
						url("/fonts/minecraft.eot?") format("eot"),
						url("/fonts/minecraft.woff") format("woff"),
						url("/fonts/minecraft.ttf") format("truetype"),
						url("/fonts/minecraft.svg#Minecraft") format("svg");
					font-weight: normal;
					font-style: normal;
				}
				.face, .tab, line {
					stroke: rgba(0,0,0,0.5);
					stroke-width: 0.015625;
					fill: transparent;
					image-rendering: -moz-crisp-edges;
				}
				image {
					image-rendering:-moz-crisp-edges;
					image-rendering: -o-crisp-edges;
					image-rendering:-webkit-optimize-contrast;
					-ms-interpolation-mode:nearest-neighbor;
				}
				text {
					font-family: 'Minecraft';
					font-weight:normal;
					font-style: normal;
					fill: white;
					font-size: 8px;
				}
				.title text, #message text {
					font-size: 16px;
				}
				text.shadow {
					fill: #404040;
				}
				text.code {
					fill: black;
				}
				@media "screen" {
					svg {
						width: 385px;
						height: 672px;
					}
				}
			]]>
		</style>
		<g id="tile-defs">
			<g id="top-tile">
				<image width="1" height="1" x="-0.5" y="-0.5" class="face"
				xlink:href="http://minecraft-cube.comuv.com/textures/<?php echo $theme['top'] ?>.png" />
			</g>
			<g id="side-tile">
				<image width="1" height="1" x="-0.5" y="-0.5" class="face"
				xlink:href="http://minecraft-cube.comuv.com/textures/<?php echo $theme['side'] ?>.png" />
			</g>
			<g id="end-tile">
				<image width="1" height="1" x="-0.5" y="-0.5" class="face"
				xlink:href="http://minecraft-cube.comuv.com/textures/<?php echo $theme['end'] ?>.png" />
			</g>
			<g id="bottom-tile">
				<image width="1" height="1" x="-0.5" y="-0.5" class="face"
				xlink:href="http://minecraft-cube.comuv.com/textures/<?php echo $theme['bottom'] ?>.png" />
			</g>
		</g>
		<g id="tab-defs">
			<polygon id="tab-top-polygon" class="tab"
			         points="-0.5,0.5 -0.25,0.25 0.25,0.25 0.5, 0.5" />
			
			<use id="tab-right-polygon" xlink:href="#tab-top-polygon" transform="rotate(90)" />
			<use id="tab-bottom-polygon" xlink:href="#tab-top-polygon" transform="rotate(180)" />
			<use id="tab-left-polygon" xlink:href="#tab-top-polygon" transform="rotate(270)" />
			
			<clipPath id="tab-top-clip">
				<use xlink:href="#tab-top-polygon" />
			</clipPath>
			<clipPath id="tab-right-clip">
				<use xlink:href="#tab-top-polygon" transform="rotate(90)" />
			</clipPath>
			<clipPath id="tab-bottom-clip">
				<use xlink:href="#tab-top-polygon" transform="rotate(180)" />
			</clipPath>
			<clipPath id="tab-left-clip">
				<use xlink:href="#tab-top-polygon" transform="rotate(270)" />
			</clipPath>
		</g>
		<g id="part-face-defs">
			<polygon id="part-face-poly" class="face"
			         points="0.5,0.5 0.5,-0.5 0,-0.5 0, 0 -0.5,0.5" transform="rotate(270)"/>
			<g id="part-face-polygon">
				<use xlink:href="#part-face-poly" />
				<line x1="0" y1="0" x2="0.5" y2="-0.5" />
			</g>
			<use id="part-face-polygon-180" xlink:href="#part-face-polygon" transform="rotate(180)" />
			
			<clipPath id="part-face-clip">
				<use xlink:href="#part-face-poly" />
			</clipPath>
			<clipPath id="part-face-clip-180">
				<use xlink:href="#part-face-poly" transform="rotate(180)" />
			</clipPath>
		</g>
		<g id="face-defs">
			<rect id="face-polygon" class="face"
			      width="1" height="1" x="-0.5" y="-0.5" />
				  
			<clipPath id="face-clip">
				<use xlink:href="#face-polygon" />
			</clipPath>
		</g>
<?php if(!$clean): ?>
		<g id="minecraft" class="title" transform="scale(0.0078125)">
			<text text-anchor="middle"
				  transform="translate(2,8)" class="shadow">Minecraft!</text>
			<text text-anchor="middle"
				  transform="translate(0,6)">Minecraft!</text>
		</g>
<?php endif; ?>
	</defs>
		
	<g transform="scale(16)">
		<g id="tabs">
			<g transform="translate(0.5, 0.5)"
			   clip-path="url(#tab-left-clip)">
				<use xlink:href="#side-tile" transform="rotate(180)" />
				<use xlink:href="#tab-left-polygon" />
			</g>
			<g transform="translate(1.5, 1.5)"
			   clip-path="url(#tab-bottom-clip)">
				<use xlink:href="#top-tile" />
				<use xlink:href="#tab-bottom-polygon" />
			</g>
			<g transform="translate(1.5, 1)"
			   clip-path="url(#tab-top-clip)">
				<use xlink:href="#end-tile" transform="rotate(180)" />
				<use xlink:href="#tab-top-polygon" />
			</g>
			<g transform="translate(2.5, 2)"
			   clip-path="url(#tab-right-clip)">
				<use xlink:href="#side-tile" transform="rotate(270)" />
				<use xlink:href="#tab-right-polygon" />
			</g>
			<g transform="translate(0.5, 3)"
			   clip-path="url(#tab-left-clip)">
				<use xlink:href="#side-tile" />
				<use xlink:href="#tab-left-polygon" />
			</g>
			<g transform="translate(1.5, 4)"
			   clip-path="url(#tab-bottom-clip)">
				<use xlink:href="#bottom-tile" />
				<use xlink:href="#tab-bottom-polygon" />
			</g>
			<g transform="translate(1.5, 3.5)"
			   clip-path="url(#tab-top-clip)">
				<use xlink:href="#end-tile" />
				<use xlink:href="#tab-top-polygon" />
			</g>
			<g transform="translate(2.5, 4.5)"
			   clip-path="url(#tab-right-clip)">
				<use xlink:href="#side-tile" transform="rotate(90)" />
				<use xlink:href="#tab-right-polygon" />
			</g>
			<g transform="translate(1.5, 5.5)"
			   clip-path="url(#tab-bottom-clip)">
				<use xlink:href="#end-tile" transform="rotate(180)" />
				<use xlink:href="#tab-bottom-polygon" />
			</g>
		</g>

		<g id="tiles">
			<g transform="translate(1.5, 0.5)"
			   clip-path="url(#face-clip)">
				<use xlink:href="#end-tile" transform="rotate(180)" />
				<use xlink:href="#face-polygon" />
			</g>
			<g transform="translate(2.5, 0.5)"
			   clip-path="url(#part-face-clip-180)">
				<use xlink:href="#side-tile" transform="rotate(180)" />
				<use xlink:href="#part-face-polygon-180" />
			</g>
			<g transform="translate(0.5, 2)"
			   clip-path="url(#part-face-clip)">
				<use xlink:href="#side-tile" transform="rotate(90)" />
				<use xlink:href="#part-face-polygon" />
			</g>
			<g transform="translate(1.5, 2)"
			   clip-path="url(#face-clip)">
				<use xlink:href="#top-tile" />
				<use xlink:href="#face-polygon" />
				<use xlink:href="#minecraft" />
			</g>
			<g transform="translate(1.5, 3)"
			   clip-path="url(#face-clip)">
				<use xlink:href="#end-tile" transform="rotate(0)" />
				<use xlink:href="#face-polygon" />
			</g>
			<g transform="translate(2.5, 3)"
			   clip-path="url(#part-face-clip-180)">
				<use xlink:href="#side-tile" transform="rotate(0)" />
				<use xlink:href="#part-face-polygon-180" />
			</g>
			<g transform="translate(1.5, 4.5)"
			   clip-path="url(#face-clip)">
				<use xlink:href="#bottom-tile" />
				<use xlink:href="#face-polygon" />
<?php if(!$clean): ?>
				<g transform="scale(0.0078125)">
					<g id="message" transform="translate(1,7)">
						<g transform="translate(0,-48)">
							<text text-anchor="middle"
								  transform="translate(1,1)"
								  class="shadow"><?php echo $line1 ?></text>
							<text text-anchor="middle"
								  transform="translate(-1,-1)"><?php echo $line1 ?></text>
						</g>
						<g transform="translate(0,-24)">
							<text text-anchor="middle"
								  transform="translate(1,1)"
								  class="shadow"><?php echo $line2 ?></text>
							<text text-anchor="middle"
								  transform="translate(-1,-1)"><?php echo $line2 ?></text>
						</g>
					</g>
					
					<rect x="-56" y="-8" width="112" height="16" fill="rgba(255,255,255,0.5)" rx="8" ry="8" />
					<text text-anchor="middle" class="code"
					      transform="translate(1,4)"><?php echo $code ?></text>
						  
					<g id="url" transform="translate(1,3)">
						<text text-anchor="middle"
							  transform="translate(0.5,32.5)"
							  class="shadow">minecraft.net/redeem.jsp</text>
						<text text-anchor="middle"
							  transform="translate(-0.5,31.5)">minecraft.net/redeem.jsp</text>
					</g>
				</g>
<?php endif; ?>
			</g>
			<g transform="translate(0.5, 4.5)"
			   clip-path="url(#part-face-clip)">
				<use xlink:href="#side-tile" transform="rotate(270)" />
				<use xlink:href="#part-face-polygon" />
			</g>
		</g>	
	</g>
</svg>

