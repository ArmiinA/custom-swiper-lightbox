<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Custom_Swiper_Lightbox_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'custom_swiper_lightbox';
    }

    public function get_title() {
        return __( 'Custom Swiper Lightbox', 'custom-swiper-lightbox' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return [ 'basic' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __( 'Content', 'custom-swiper-lightbox' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'images',
            [
                'label' => __( 'Add Images', 'custom-swiper-lightbox' ),
                'type' => \Elementor\Controls_Manager::GALLERY,
                'default' => [],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'custom-swiper-lightbox' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'width',
            [
                'label' => __( 'Width', 'custom-swiper-lightbox' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%', 'px' ],
                'range' => [
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 100,
                        'max' => 1920,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'height',
            [
                'label' => __( 'Height', 'custom-swiper-lightbox' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh' ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1080,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'vh',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .swiper-container' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $images = $settings['images'];

        if ( empty( $images ) ) {
            return;
        }

        echo '<div class="swiper-container">';
        echo '<div class="swiper-wrapper">';

        foreach ( $images as $image ) {
            echo '<div class="swiper-slide">';
            echo '<a href="' . esc_url( $image['url'] ) . '" class="lightbox">';
            echo '<img src="' . esc_url( $image['url'] ) . '" alt="' . esc_attr( $image['caption'] ) . '">';
            echo '</a>';
            echo '</div>';
        }

        echo '</div>';
        echo '<div class="swiper-pagination"></div>';
        echo '<div class="swiper-button-next"></div>';
        echo '<div class="swiper-button-prev"></div>';
        echo '</div>';
    }

    public function get_script_depends() {
        return [ 'custom-swiper-lightbox-script' ];
    }

    public function get_style_depends() {
        return [ 'custom-swiper-lightbox-style' ];
    }
}
