@include('News.header')
<!doctype html>
<html>
<head>
<meta charset="utf-8">
   <title>Bring Your Charts to Life</title>
  <script type="text/javascript">
 
        // 图表数据
        var arrVisitors = new Array();
        arrVisitors[0] = "2007, 2";
        arrVisitors[1] = "2008, 10";
        arrVisitors[2] = "2009, 10";
        arrVisitors[3] = "2010, 10";
        arrVisitors[4] = "2011, 10";
        arrVisitors[5] = "2012, 10";
        arrVisitors[6] = "2013, 10";
        arrVisitors[7] = "2014, 10";
        var canvas;
        var context;
        // 图表属性
        var cWidth, cHeight, cMargin, cSpace;
        var cMarginSpace, cMarginHeight;
        // 条形图属性
        var bWidth, bMargin, totalBars, maxDataValue;
        var bWidthMargin;
        // 条形动画
        var ctr, numctr, speed;
        // 轴属性
        var totLabelsOnYAxis;
        // 条形图构造函数
        function barChart() {
            canvas = document.getElementById('bchart');
            if (canvas && canvas.getContext) {
                context = canvas.getContext('2d');
            }
            chartSettings();
            drawAxisLabelMarkers();
            drawChartWithAnimation();
        }
        // 初始化图表和条形图值
        function chartSettings() {
            // 图表属性
            cMargin = 25;
            cSpace = 60;
            cHeight = canvas.height - 2 * cMargin - cSpace;
            cWidth = canvas.width - 2 * cMargin - cSpace;
            cMarginSpace = cMargin + cSpace;
            cMarginHeight = cMargin + cHeight;
            // 条形图属性
            bMargin = 15;
            totalBars = arrVisitors.length;
            bWidth = (cWidth / totalBars) - bMargin;
            //找到要在图表上绘制的最大值
            maxDataValue = 0;
            for (var i = 0; i < totalBars; i++) {
                var arrVal = arrVisitors[i].split(",");
                var barVal = parseInt(arrVal[1]);
                if (parseInt(barVal) > parseInt(maxDataValue))
                    maxDataValue = barVal;
            }
            totLabelsOnYAxis = 10;
            context.font = "10pt Garamond";
            
            // 初始化动画变量
            ctr = 0;
            numctr = 100;
            speed = 10;
        }
        // 绘制图表轴、标签和标记
        function drawAxisLabelMarkers() {
            context.lineWidth = "2.0";
            // 绘制y轴
            drawAxis(cMarginSpace, cMarginHeight, cMarginSpace, cMargin);
            //绘制x轴
            drawAxis(cMarginSpace, cMarginHeight, cMarginSpace + cWidth, cMarginHeight);
            context.lineWidth = "1.0";
            drawMarkers();
        }
        //绘制X和Y轴
        function drawAxis(x, y, X, Y) {
            context.beginPath();
            context.moveTo(x, y);
            context.lineTo(X, Y);
            context.closePath();
            context.stroke();
        }
        //在X和Y轴上绘制图表标记
        function drawMarkers() {
            var numMarkers = parseInt(maxDataValue / totLabelsOnYAxis);
            context.textAlign = "right";
            context.fillStyle = "#000";;
            //y轴
            for (var i = 0; i <= totLabelsOnYAxis; i++) {
                markerVal = i * numMarkers;
                markerValHt = i * numMarkers * cHeight;
                var xMarkers = cMarginSpace - 5;
                var yMarkers = cMarginHeight - (markerValHt / maxDataValue);
                context.fillText(markerVal, xMarkers, yMarkers, cSpace);
            }
            //X轴
            context.textAlign = 'center';
            for (var i = 0; i < totalBars; i++) {
                 arrval = arrVisitors[i].split(",");
                 name = arrval[0];
                 markerXPos = cMarginSpace + bMargin 
                              + (i * (bWidth + bMargin)) + (bWidth/2);
                 markerYPos = cMarginHeight + 15; //X轴文字位置
                 context.fillText(name, markerXPos, markerYPos, bWidth);
            }
            context.save();
            //添加Y轴标题
            context.translate(cMargin + 10, cHeight / 2);
            context.rotate(Math.PI * -90 / 180);
            context.fillText('', 0, 0);
            context.restore();
            //添加X轴标题
            context.fillText('订单统计', cMarginSpace + 
                        (cWidth / 2), cMarginHeight + 30 );
        }
        function drawChartWithAnimation() {
            //循环遍历总条并绘制
            for (var i = 0; i < totalBars; i++) {
                var arrVal = arrVisitors[i].split(",");
                bVal = parseInt(arrVal[1]);
                bHt = (bVal * cHeight / maxDataValue) / numctr * ctr;
                bX = cMarginSpace + (i * (bWidth + bMargin)) + bMargin;
                bY = cMarginHeight - bHt - 2;
                drawRectangle(bX, bY, bWidth, bHt, true);
            }
            // 超时运行并检查是否已达到条
            // 所需高度；如果不是，则继续增长
            if (ctr < numctr) {
                ctr = ctr + 1;
                setTimeout(arguments.callee, speed);
            }
        }
        function drawRectangle(x, y, w, h, fill) {
            context.beginPath();          
            context.rect(x, y, w, h);          
            context.closePath();
            context.stroke();
            if (fill) {
                var gradient = context.createLinearGradient(0, 0, 0, 300);
                gradient.addColorStop(0, 'yellow');
                //gradient.addColorStop(1, 'rgba(67,203,36,.15)');
                gradient.addColorStop(1, 'red');
                context.fillStyle = gradient;
                context.strokeStyle = gradient;
                context.fill();
            }
        }
</script>
 <noscript>
  此图表不可用，因为您的计算机上禁用了JavaScript。 请启用
   JavaScript并刷新此页面以查看正在运行的图表。
 </noscript>
</head>
 <body onLoad="barChart();">
   <canvas id="bchart" height="400" width="600">您的浏览器不支持HTML5 Canvas
   </canvas>
</body></html>
@include('News.footer')