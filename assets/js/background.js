const canvas = document.createElement('canvas');
const ctx = canvas.getContext('2d');
const canvasContainer = document.getElementById('canvas-container');
canvasContainer.appendChild(canvas);

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

class Point {
    constructor(x, y) {
        this.x = x;
        this.y = y;
        this.vx = Math.random() * 0.5 - 0.25;
        this.vy = Math.random() * 0.5 - 0.25;
    }

    update() {
        this.x += this.vx;
        this.y += this.vy;

        if (this.x < 0 || this.x > canvas.width) {
            this.vx = -this.vx;
        }

        if (this.y < 0 || this.y > canvas.height) {
            this.vy = -this.vy;
        }
    }
}

const points = [];
const numPoints = 150;
const maxDistance = 100;

for (let i = 0; i < numPoints; i++) {
    points.push(new Point(Math.random() * canvas.width, Math.random() * canvas.height));
}

function connectPoints(pointA, pointB) {
    const dx = pointA.x - pointB.x;
    const dy = pointA.y - pointB.y;
    const distance = Math.sqrt(dx * dx + dy * dy);

    if (distance < maxDistance) {
        ctx.strokeStyle = `rgba(0, 0, 255, ${1 - distance / maxDistance})`;
        ctx.beginPath();
        ctx.moveTo(pointA.x, pointA.y);
        ctx.lineTo(pointB.x, pointB.y);
        ctx.stroke();
    }
}

function loop() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (const point of points) {
        point.update();
    }

    for (let i = 0; i < points.length; i++) {
        for (let j = i + 1; j < points.length; j++) {
            connectPoints(points[i], points[j]);
        }
    }

    requestAnimationFrame(loop);
}

loop();

document.addEventListener('mousemove', (e) => {
    points[0].x = e.clientX;
    points[0].y = e.clientY;
});
