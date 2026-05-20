import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { CTAButton } from '../components/CTAButton';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps, mockUrls } from '../data/mockData';

interface ReviewRequestEmailProps extends CommonEmailProps {
  reviewUrl?: string;
}

export const ReviewRequestEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  reviewUrl = mockUrls.reviewUrl,
}: ReviewRequestEmailProps) => {
  const previewText = 'Tu experiencia puede ayudar a otros viajeros.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Espero que ya estéis totalmente asentados y con las endorfinas del viaje todavía presentes.
          </Paragraph>
          <Paragraph>
            Os escribo muy brevemente para pediros un pequeño favor. Para una agencia boutique como UKIYO, donde todo el esfuerzo está en el boca a boca y la confianza, el aval de nuestros viajeros es la pieza más importante.
          </Paragraph>
          <Paragraph>
            Si habéis tenido una experiencia positiva y sentís que nuestro acompañamiento ha marcado la diferencia, os agradeceríamos infinitamente si pudieseis tomaros un par de minutos para dejar una reseña en Google.
          </Paragraph>

          <CTAButton href={reviewUrl}>
            Compartir mi experiencia en Google
          </CTAButton>

          <Paragraph>
            Vuestras palabras son lo que hace posible que otros viajeros se animen a confiar en nuestra forma de hacer las cosas.
          </Paragraph>
          <Paragraph>
            Gracias por partida doble: por haber viajado con nosotros y por vuestro apoyo.
          </Paragraph>

          <SignatureBlock 
            name={senderName} 
            role={senderRole} 
            photoUrl={senderPhotoUrl}
            email={senderEmail}
            phone={senderPhone}
          />
        </Card>
      </Section>
      <Footer supportEmail={supportEmail} />
    </EmailLayout>
  );
};

export default ReviewRequestEmail;
