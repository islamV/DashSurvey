@extends('dash::app')
@section('content')


<div class="row">
    {!! $content !!}
</div>
@livewire('survey-reports')

<script src="{{ asset('js/html2pdf.bundle.min.js') }}"></script>
<script src="{{ asset('js/html2pdf.bundle.js') }}"></script>

<script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/vendor/multi-select/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets/vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('assets/vendor/datatables/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/datatables/js/data-table.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
<script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<Script src="{{ asset('js/jspdf.debug.js') }}"></Script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NGB9ym/+WnJ6Xqz5PjC3jdbzMWbeYG/7U7J6uymG/jfMvUSjq5rSmolki/+c/2Wq" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>


 function pdfTable() {
  const table = document.getElementById('myTable');
  const pdf = new jsPDF('p', 'pt', 'letter');
  const options = {
    'background': '#fff',
    'width': 180,
    'height': (table.offsetHeight + 1) * 1.3
  };
  const html = table.outerHTML.replace(/ /g, '%20');
  const pdfDoc = new jsPDF('p', 'pt', 'letter');
  pdfDoc.fromHTML(html, 15, 15, options, function(dispose) {
    pdfDoc.save('table.pdf');
  });
}    
function printTable() {
const table = document.getElementById('myTable');
const html = `
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Print Table</title>
<style>
  body {
    font-family: Arial, sans-serif;
  }
  table {
    width: 100%;
    border-collapse: collapse;
  }
  th,
  td {
    padding: 8px;
    border: 1px solid black;
  }
  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  @media print {
    body {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      border: initial;
      border-radius: initial;
      width: initial;
      min-width: initial;
      max-width: initial;
      font-size: 12pt;
      font-family: initial;
      font-weight: normal;
      color: initial;
      background-color: initial;
      page-break-after: always;
      page-break-inside: avoid;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th,
    td {
      padding: 8px;
      border: 1px solid black;
    }
    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  }
</style>
</head>
<body>
${table.outerHTML}
</body>
</html>
`;
const newWin = window.open('', 'Print-Window');
newWin.document.write(html);
newWin.document.close();
newWin.focus();
newWin.print();
newWin.close();
};

        </script>
@endsection
