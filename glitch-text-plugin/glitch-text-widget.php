<?php

class SSEW_Glitch_Text_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'ssew_glitch_text';
    }

    public function get_title() {
        return __( 'Glitch Text', 'ssew' );
    }

    public function get_icon() {
        return 'eicon-t-letter';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'ssew' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'text',
            [
                'label' => __( 'Text', 'ssew' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '404', 'ssew' ),
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Text Color', 'ssew' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ssew-glitch-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_type',
            [
                'label' => __( 'Background Type', 'ssew' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'color' => [
                        'title' => __( 'Color', 'ssew' ),
                        'icon' => 'eicon-paint-brush',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'ssew' ),
                        'icon' => 'eicon-image',
                    ],
                ],
                'default' => 'color',
            ]
        );

        $this->add_control(
            'background_color',
            [
                'label' => __( 'Background Color', 'ssew' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'background_type' => 'color',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ssew-glitch-text-wrapper' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'background_image',
            [
                'label' => __( 'Background Image', 'ssew' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'background_type' => 'image',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ssew-glitch-text-wrapper' => 'background-image: url("{{URL}}"); background-size: cover;',
                ],
            ]
        );

        $this->add_control(
            'font_family',
            [
                'label' => __( 'Font Family', 'ssew' ),
                'type' => \Elementor\Controls_Manager::FONT,
                'default' => 'Fira Mono',
                'selectors' => [
                    '{{WRAPPER}} .ssew-glitch-text' => 'font-family: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'wrapper_width',
            [
                'label' => __( 'Width', 'ssew' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%', 'px', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 2000,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    'vw' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ssew-glitch-text-wrapper' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'wrapper_height',
            [
                'label' => __( 'Height', 'ssew' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh', '%' ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 2000,
                    ],
                    'vh' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 100,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ssew-glitch-text-wrapper' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'background_size',
            [
                'label' => __( 'Background Size', 'ssew' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'auto' => __( 'Auto', 'ssew' ),
                    'cover' => __( 'Cover', 'ssew' ),
                    'contain' => __( 'Contain', 'ssew' ),
                ],
                'default' => 'cover',
                'condition' => [
                    'background_type' => 'image',
                ],
                'selectors' => [
                    '{{WRAPPER}} .ssew-glitch-text-wrapper' => 'background-size: {{VALUE}};',
                ],
            ]
        );
        

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>

<div class="ssew-glitch-text-wrapper">
    <div class="ssew-glitch-text" title="<?php echo esc_attr( $settings['text'] ); ?>">
        <?php echo esc_html( $settings['text'] ); ?>
    </div>
</div>

<?php
    }
}