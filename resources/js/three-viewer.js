import * as THREE from 'three';
import { GLTFLoader } from 'three/examples/jsm/loaders/GLTFLoader.js';
import { FBXLoader } from 'three/examples/jsm/loaders/FBXLoader.js';
import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js';

function getLoader(url) {
    const ext = url.split('.').pop().toLowerCase();

    if (ext === 'glb' || ext === 'gltf') return new GLTFLoader();
    if (ext === 'fbx') return new FBXLoader();

    return null;
}

function initSingle(container) {
    const url = container.dataset.model;

    if (!url) return;

    const loader = getLoader(url);
    if (!loader) {
        console.warn('Formato no soportado:', url);
        return;
    }

    const scene = new THREE.Scene();

    const camera = new THREE.PerspectiveCamera(
        60,
        container.clientWidth / container.clientHeight,
        0.1,
        1000
    );

    const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
    renderer.setSize(container.clientWidth, container.clientHeight);
    container.appendChild(renderer.domElement);

    // Luz
    const light = new THREE.HemisphereLight(0xffffff, 0x444444, 1.2);
    scene.add(light);

    // Controles
    const controls = new OrbitControls(camera, renderer.domElement);
    controls.enableDamping = true;

    loader.load(url, (obj) => {
        const model = obj.scene || obj;

        // Normalizar escala
        scene.add(model);

        // Bounding box real
        const box = new THREE.Box3().setFromObject(model);
        const size = box.getSize(new THREE.Vector3());
        const center = box.getCenter(new THREE.Vector3());

        // centrar modelo
        model.position.sub(center);

        // calcular distancia correcta de cámara
        const maxDim = Math.max(size.x, size.y, size.z);
        const fov = camera.fov * (Math.PI / 180);
        let cameraZ = Math.abs(maxDim / 2 / Math.tan(fov / 2));

        // margen
        cameraZ *= 1.5;

        camera.position.set(0, 0, cameraZ);

        // ajustar near/far (esto es clave)
        camera.near = cameraZ / 100;
        camera.far = cameraZ * 100;
        camera.updateProjectionMatrix();

    }, undefined, (err) => {
        console.error('Error loading model:', err);
    });

    camera.position.z = 3;

    function animate() {
        requestAnimationFrame(animate);
        controls.update();
        renderer.render(scene, camera);
    }

    animate();

    // Resize fix
    window.addEventListener('resize', () => {
        camera.aspect = container.clientWidth / container.clientHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(container.clientWidth, container.clientHeight);
    });
}

export function initAllThree() {
    document.querySelectorAll('.three-container')
        .forEach(initSingle);
}