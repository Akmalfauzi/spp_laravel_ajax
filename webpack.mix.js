const mix = require('laravel-mix');

mix.styles([
		'public/dist/assets/modules/bootstrap/css/bootstrap.min.css',
		'public/dist/assets/modules/jqvmap/dist/jqvmap.min.css',
		'public/dist/assets/modules/summernote/summernote-bs4.css',
		'public/dist/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css',
		'public/dist/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css',
		'public/dist/assets/css/style.css',
		'public/dist/assets/css/components.css',
		'public/dist/assets/modules/datatables/datatables.min.css',
		'public/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css',
		'public/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css',
	],
	'public/css/all_css.css').version();

// mix.scripts([
// 		'public/dist/assets/modules/popper.js',
// 		'public/dist/assets/modules/tooltip.js',
// 		'public/dist/assets/modules/bootstrap/js/bootstrap.min.js',
// 		'public/dist/assets/modules/nicescroll/jquery.nicescroll.min.js',
// 		'public/dist/assets/modules/moment.min.js',
// 		'public/dist/assets/js/stisla.js',
// 		'public/dist/assets/modules/owlcarousel2/dist/owl.carousel.min.js',
// 		'public/dist/assets/modules/summernote/summernote-bs4.js',
// 		'public/dist/assets/js/scripts.js',
// 		'public/dist/assets/js/custom.js',
// 		'public/dist/assets/modules/datatables/datatables.min.js',
// 		'public/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
// 		'public/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js',
// 		'public/dist/assets/modules/jquery-ui/jquery-ui.min.js',
// 		'public/dist/assets/js/page/modules-datatables.js',
// 	],
// 	'public/js/all_js.js').version();