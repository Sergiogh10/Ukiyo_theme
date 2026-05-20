import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { HighlightQuote } from '../components/HighlightQuote';
import { Card } from '../components/Card';
import { Section, Text } from '@react-email/components';
import { CommonEmailProps, mockCommonProps, mockLocalTips } from '../data/mockData';

interface LocalTipsEmailProps extends CommonEmailProps {
  tips?: typeof mockLocalTips;
}

export const LocalTipsEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  tips = mockLocalTips,
}: LocalTipsEmailProps) => {
  const previewText = 'Algunas claves para vivir mejor el destino.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Antes de viajar, siempre ayuda tener a mano algunas claves sencillas del destino. Son detalles prácticos que suelen marcar bastante la experiencia una vez allí.
          </Paragraph>
          
          <HighlightQuote>
            Para nosotros, este viaje no es solo cruzar medio mundo, es sumergirse y caminar despacio.
          </HighlightQuote>

          <Paragraph>
            Por eso te dejamos aquí unos apuntes claros y directos, basados en nuestra experiencia sobre el terreno, para que lleguéis con más contexto y con todo más fácil.
          </Paragraph>

          <Section style={{ marginTop: '32px' }}>
            {tips.map((tip, index) => (
              <Section key={index} style={{ marginBottom: '24px' }}>
                <Text style={{ margin: '0 0 4px 0', fontSize: '15px', fontWeight: '600', color: '#6B3410' }}>
                  {tip.title}
                </Text>
                <Text style={{ margin: '0', fontSize: '14px', lineHeight: '22px', color: '#6B6B6B' }}>
                  {tip.description}
                </Text>
              </Section>
            ))}
          </Section>

          <Paragraph>
            Guárdalo y revísalo cuando te venga bien. La idea es que te sirva de verdad durante el viaje.
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

export default LocalTipsEmail;
