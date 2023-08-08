//Sidebar toggle
var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function openSidebar(){
    if(!sidebarOpen) {
        sidebar.classList.add("sidebar-responsive");
        sidebarOpen = true;
    }
}

function closeSidebar() {
    if(sidebarOpen) {
        sidebar.classList.remove("sidebar-responsive");
        sidebarOpen = false;
    }
}

// ------------- CHART --------------
// BAR CHART
    
        




  // ---- AREA CHART ----
  google.charts.load('current', { packages: ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'getData.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var responseData = JSON.parse(xhr.responseText);

      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Month');
      data.addColumn('number', 'Sales');
      data.addRows(responseData);

      var options = {
        hAxis: { title: 'Month', titleTextStyle: { color: '#333' } },
        vAxis: { minValue: 0 }
      };

      var chart = new google.visualization.AreaChart(document.getElementById('area-chart'));
      chart.draw(data, options);
    }
  };
  xhr.send();
}
   


  function showForm() {
    var formContainer = document.getElementById("formContainer");
    formContainer.style.display = "block";
    window.location.href = "AddNewStaff.php";
  }

  function closeForm() {
    var formContainer = document.getElementById("formContainer");
    formContainer.style.display = "none";
    window.location.href = "Staff.php";
  }

  function showFormSupp() {
    var formContainersupp = document.getElementById("formContainersupp");
    formContainersupp.style.display = "block";
    window.location.href = "AddNewSupplier.php";
  }

  function closeFormSupp() {
    var formContainersupp = document.getElementById("formContainersupp");
    formContainersupp.style.display = "none";
    window.location.href = "Supplier.php";
  }

  /*
  var barChartOptions = {
            series: [{
            data: data.map(registration => parseInt(registration.courseID)),
          }],
            chart: {
            type: 'bar',
            height: 350,
            toolbar: {
                show: false
            },
          },

          colors: [
            "#245dec",
            "#cc3c43",
            "#367952",
            "#f5b74f",
            "#4f35a1"
          ],

          plotOptions: {
            bar: {
              distributed: true,
              borderRadius: 4,
              horizontal: false,
              columnWidth: '40%',
            }
          },
          dataLabels: {
            enabled: false
          },
          legend: {
            show: false
          },
          xaxis: {
            categories: data.map(course => course.course_name),
          },
          yaxis: {
            title: {
                text: "Count"
            }
          }
          };

          var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
          barChart.render();
        }

        var data = JSON.parse(xhr.responseText);

        // Initialize and render the area chart with the fetched data
        var areaChartOptions = {
          series: [
            {
              name: 'Monthly Sales',
              data: data.map(item => parseInt(item.total_amount)),
            }
          ],
          chart: {
            height: 350,
            type: 'area',
            toolbar: {
              show: false
            }
          },
          colors: ["#4f35a1", "#246dec"],
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth'
          },
          labels: data.map(item => item.month),
          markers: {
            size: 0
          },
          yaxis: [
            {
              title: {
                text: 'Monthly Sales'
              }
            }
          ],
          tooltip: {
            shared: true,
            intersect: false
          }
        };

        var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
        areaChart.render();
  */