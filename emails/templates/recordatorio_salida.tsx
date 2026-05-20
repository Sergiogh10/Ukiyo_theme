import * as React from 'react';
import { EmailLayout } from '../components/EmailLayout';
import { Header } from '../components/Header';
import { Footer } from '../components/Footer';
import { SectionTitle } from '../components/SectionTitle';
import { Paragraph } from '../components/Paragraph';
import { SignatureBlock } from '../components/SignatureBlock';
import { ChecklistBlock } from '../components/ChecklistBlock';
import { Divider } from '../components/Divider';
import { ContactBlock } from '../components/ContactBlock';
import { Card } from '../components/Card';
import { Section } from '@react-email/components';
import { CommonEmailProps, mockCommonProps, mockChecklist } from '../data/mockData';

interface PreDepartureReminderEmailProps extends CommonEmailProps {
  checklist?: string[];
}

export const PreDepartureReminderEmail = ({
  clientName = mockCommonProps.clientName,
  senderName = mockCommonProps.senderName,
  senderRole = mockCommonProps.senderRole,
  senderPhotoUrl = mockCommonProps.senderPhotoUrl,
  senderEmail = mockCommonProps.senderEmail,
  senderPhone = mockCommonProps.senderPhone,
  supportEmail = mockCommonProps.supportEmail,
  checklist = mockChecklist,
}: PreDepartureReminderEmailProps) => {
  const previewText = 'Todo listo para vuestro viaje.';

  return (
    <EmailLayout previewText={previewText}>
      <Header />
      <Section style={{ padding: '0 48px' }}>
        <Card>
          <SectionTitle as="h1">Hola {clientName},</SectionTitle>
          <Paragraph>
            Faltan apenas unos días. Es ese momento de hormigueo en el estómago de cuando por fin cerramos la maleta y se acaban las esperas.
          </Paragraph>
          <Paragraph>
            Solo quería asegurarme de que sientes que todo está bajo control y hacerte llegar un repaso clarificador de ultimísimo momento.
          </Paragraph>

          <SectionTitle as="h3">Checklist final antes de salir</SectionTitle>
          <ChecklistBlock items={checklist} />

          <Divider />

          <Paragraph>
            Durante los próximos días tendrás habilitado nuestro contacto directo en destino para casos de urgencias, aunque lo ideal es que vuestro tiempo transcurra sin sobresaltos para que os centréis en disfrutar el momento.
          </Paragraph>
          <Paragraph>
            Mucha suerte cerrando todo en casa, respirad tranquilos y, por favor, disfrutadlo infinito porque este viaje ya es vuestro.
          </Paragraph>

          <ContactBlock supportEmail={supportEmail} />

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

export default PreDepartureReminderEmail;
