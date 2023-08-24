import './bootstrap.js';
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
import 'particles.js';


// Particle background implément

particlesJS('particles-js', {
    'particles': {
    'number': {
        'value': 300,
        'density': {
        'enable': true,
        'value_area': 1800
        }
    },
    'color': {
        'value': '#ffffff'
    },
    'shape': {
        'type': '',
        'random': true,
        'stroke': {
        'width': 0,
        'color': 'red'
        },
        'polygon': {
        'nb_sides': 6
        }
    },
    'opacity': {
        'value': 1,
        'random': true,
        'anim': {
        'enable': false,
        'speed': 1,
        'opacity_min': 0.1,
        'sync': false
        }
    },
    'size': {
        'value': 80,
        'random': true,
        'anim': {
        'enable': true,
        'speed_min': .2,
        'size_min': 2,
        'sync': false
        }
    },
    'line_linked': {
        'enable': true,
        'distance': 200,
        'color': '#0051d7',
        'opacity': 1,
        'width': 1
    },
    'move': {
        'enable': true,
        'speed_min': 6,
        'direction': 'none',
        'random': true,
        'straight': false,
        'out_mode': 'out',
        'bounce': false,
        'attract': {
        'enable': false,
        'rotateX': 1200,
        'rotateY': 1200
        }
    }
    },
    'interactivity': {
    'detect_on': 'canvas',
    'events': {
        'onhover': {
        'enable': false,
        'mode': 'grab'
        },
        'onclick': {
        'enable': false,
        'mode': 'push'
        },
        'resize': true
    },
    'modes': {
        'grab': {
        'distance': 400,
        'line_linked': {
            'opacity': 1
        }
        },
        'repulse': {
        'distance': 200,
        'duration': 0.4
        },
        'push': {
        'particles_nb': 4
        },
        'remove': {
        'particles_nb': 2
        }
    }
    },
    'retina_detect': true
});

console.log("hello world");
