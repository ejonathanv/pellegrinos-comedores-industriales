<x-website-layout>
	
	<x-website-slider />
	<x-website-about />
	<x-website-services />
	<x-website-gallery />
	<x-website-gallery-two />
	<x-website-clients />
	<x-website-contact />

	<a href="https://wa.me/526643756259" class="whatsapp-float" target="_blank">
		<i class="fab fa-whatsapp"></i>
		<span>Contáctanos por WhatsApp</span>
	</a>

</x-website-layout>

<style>
.whatsapp-float {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #25d366;
    color: white;
    padding: 15px 25px;
    border-radius: 50px;
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    z-index: 1000;
    transition: all 0.3s ease;
}

.whatsapp-float:hover {
    background-color: #128C7E;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.3);
}

.whatsapp-float i {
    font-size: 24px;
}

.whatsapp-float span {
    font-size: 16px;
    font-weight: 500;
}

@media (max-width: 768px) {
    .whatsapp-float span {
        display: none;
    }
    
    .whatsapp-float {
        padding: 15px;
        border-radius: 50%;
    }
}
</style>